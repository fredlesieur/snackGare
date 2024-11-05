<?php

namespace App\Config;

use App\Controllers\AccueilController;
use App\Controllers\ErrorController;

class Main
{
    /**
     * Démarre l'application en initialisant la session, gérant les requêtes et contrôlant les routes.
     */
    public function start()
    {
        // Démarrage de la session si elle n'est pas déjà active
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Création d'un token CSRF si inexistant pour la sécurité des formulaires
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        // Gestion du trailing slash dans l'URL pour une cohérence des URLs
        $uri = $_SERVER['REQUEST_URI'];
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            $this->redirect(rtrim($uri, '/'));
        }

        // **Condition pour gérer les fichiers statiques directement**
        // Si l'URI correspond à un fichier dans le dossier public, on le sert directement
        $filePath = __DIR__ . '/../../public' . $uri;
        if (file_exists($filePath) && is_file($filePath)) {
            header('Content-Type: ' . mime_content_type($filePath));
            readfile($filePath);
            exit();
        }

        // **Vérification et nettoyage CSRF pour les requêtes POST**
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération du token CSRF du formulaire ou de l'en-tête pour les requêtes AJAX
            $csrfToken = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
            // Vérification du token CSRF
            $this->checkCsrfToken($csrfToken);
            // Nettoyage des données POST pour plus de sécurité
            $_POST = $this->sanitizeFormData($_POST);
        }

        // Récupération des paramètres d'URL
        $params = $this->getParams();

        // **Gestion de la route en fonction des paramètres**
        if (!empty($params[0])) {
            // Récupération du contrôleur et de la méthode à appeler
            $controllerName = ucfirst(array_shift($params)) . 'Controller';
            $controllerClass = '\\App\\Controllers\\' . $controllerName;

            // Vérifie si le contrôleur existe
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
            } else {
                // Affiche une erreur 404 si le contrôleur n'existe pas
                $this->error404("Le contrôleur $controllerName n'existe pas.");
                return;
            }

            // Récupération de l'action (méthode) par défaut ou depuis l'URL
            $action = $params[0] ?? 'index';

            // Vérifie si la méthode existe dans le contrôleur
            if (method_exists($controller, $action)) {
                call_user_func_array([$controller, $action], array_slice($params, 1));
            } else {
                // Affiche une erreur 404 si l'action n'existe pas
                $this->error404("La méthode $action n'existe pas dans le contrôleur $controllerName.");
            }
        } else {
            // Contrôleur par défaut si aucun paramètre dans l'URL
            $controller = new AccueilController();
            $controller->index();
        }
    }

    /**
     * Redirige vers une URL sans trailing slash.
     *
     * @param string $uri L'URL à rediriger
     */
    private function redirect($uri)
    {
        http_response_code(301);
        header('Location: ' . $uri);
        exit();
    }

    /**
     * Récupère les paramètres de l'URL en les éclatant sur "/".
     *
     * @return array Les paramètres de l'URL
     */
    private function getParams()
    {
        return isset($_GET['p']) ? explode('/', $_GET['p']) : [];
    }

    /**
     * Vérifie la validité du token CSRF.
     *
     * @param string $token Le token CSRF reçu
     */
    private function checkCsrfToken($token)
    {
        if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            // Token invalide
            http_response_code(403);
            echo 'Invalid CSRF token.';
            exit();
        }
    }

    /**
     * Nettoie les données des formulaires en supprimant les balises HTML.
     *
     * @param array $data Les données du formulaire
     * @return array Les données nettoyées
     */
    private function sanitizeFormData(array $data)
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                // Nettoie récursivement les tableaux
                $sanitizedData[$key] = $this->sanitizeFormData($value);
            } else {
                // Supprime les balises HTML des chaînes
                $sanitizedData[$key] = is_string($value) ? strip_tags($value) : $value;
            }
        }
        return $sanitizedData;
    }

    /**
     * Gère les erreurs 404 et affiche un message d'erreur.
     *
     * @param string $message Message d'erreur pour affichage
     */
    private function error404($message)
    {
        http_response_code(404);
        $controller = new ErrorController();
        $controller->notFound($message);
    }
}
