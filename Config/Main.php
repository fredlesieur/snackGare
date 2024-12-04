<?php

namespace App\Config;

use App\Controllers\HomeController;

class Main
{

    public function start()
    {
        // Démarrage de la session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Création du token CSRF s'il n'existe pas déjà
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        // Retirer le trailing slash de l'URL si présent
        $uri = $_SERVER['REQUEST_URI'];
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            $uri = substr($uri, 0, -1);
            // Redirection permanente sans le / de fin (301)
            http_response_code(301);
            header('Location: ' . $uri);
            exit();
        }

        // ** Gestion des fichiers statiques **
        $filePath = realpath(__DIR__ . '/../../Public' . $uri);
        if ($filePath && file_exists($filePath) && is_file($filePath)) {
            // Le fichier existe, on le sert directement
            if (strpos($filePath, realpath(__DIR__ . '/../../Public')) === 0) {
                header('Content-Type: ' . mime_content_type($filePath));
                readfile($filePath);
                exit();
            } else {
                http_response_code(403);
                echo "Accès refusé.";
                exit();
            }
        }

        // Vérification du token CSRF et nettoyage des données POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer le token CSRF
            $csrfToken = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

            // Vérification du token CSRF
            $this->checkCsrfToken($csrfToken);

            // Nettoyage des données POST
            $_POST = $this->sanitizeFormData($_POST);
        }

        // Charger les horaires pour toutes les pages
        $horaireRepo = new \App\Repositories\HoraireRepository();
        $horairesGlobaux = $horaireRepo->findAll();
        $_SESSION['horaires'] = $horairesGlobaux;

        // Gestion des paramètres d'URL
        $params = isset($_GET['p']) ? explode('/', $_GET['p']) : [];

        if (empty($params[0]) || $params[0] === '/') {
            // Gérer le slug "/" ou une URL vide comme page d'accueil
            $controller = new HomeController();
            $controller->index();
        } elseif (!empty($params[0])) {
            // Récupération du contrôleur
            $controllerName = ucfirst(array_shift($params)) . 'Controller';
            $controllerClass = '\\App\\Controllers\\' . $controllerName;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
            } else {
                $this->error404("Le contrôleur $controllerName n'existe pas.");
                exit();
            }

            // Récupération de l'action (méthode)
            $action = isset($params[0]) ? array_shift($params) : 'index';

            // Vérification si l'utilisateur essaie d'accéder au Dashboard
            if (strpos(strtolower($controllerName), 'dashboard') !== false) {
                if (!isset($_SESSION['id'])) {
                    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
                    header('Location: /user/showLoginForm');
                    exit();
                }
            }

            // Vérification si la méthode existe dans le contrôleur
            if (method_exists($controller, $action)) {
                call_user_func_array([$controller, $action], $params);
            } else {
                $this->error404("La méthode $action n'existe pas dans le contrôleur $controllerName.");
                exit();
            }
        } else {
            // Contrôleur par défaut
            $controller = new HomeController();
            $controller->index();
        }
    }

    // Vérification du token CSRF
    public function checkCsrfToken($token)
    {
        if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            // Token invalide
            http_response_code(403);
            echo 'Invalid CSRF token.';
            exit();
        }
    }

    // Nettoyage des données POST
    private function sanitizeFormData(array $data)
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            // Si la valeur est un tableau, on applique récursivement la fonction
            if (is_array($value)) {
                $sanitizedData[$key] = $this->sanitizeFormData($value);
            } else {
                // Nettoyage de la valeur
                if (is_string($value)) {
                    $sanitizedData[$key] = strip_tags($value);
                } else {
                    // On conserve les autres types de données sans les nettoyer
                    $sanitizedData[$key] = $value;
                }
            }
        }
        return $sanitizedData;
    }

    // Gestion des erreurs 404
    private function error404($message)
    {
        http_response_code(404);
        echo $message;
    }
}
