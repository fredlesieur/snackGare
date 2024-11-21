<?php

namespace App\Controllers;

use App\Repositories\UserRepository;


class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        $this->render('login');
    }

    // Gère la connexion d'un utilisateur
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!empty($username) && !empty($password)) {
                $user = $this->userRepository->findUserByUsername($username);
                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    header("Location: /dashboard/index");
                    exit;
                } else {
                    echo "Nom d'utilisateur ou mot de passe incorrect.";
                }
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
    }

    // Affiche le formulaire d'inscription
    public function showRegisterForm()
    {
        $this->render('dashboard/users/register', ['title' => 'Créer un utilisateur'], true);
    }

    // Gère l'enregistrement d'un nouvel utilisateur
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';

            if (!empty($username) && !empty($password) && !empty($role)) {
                // Vérifiez si l'utilisateur existe déjà
                $existingUser = $this->userRepository->findUserByUsername($username);
                if ($existingUser) {
                    $_SESSION['flash_error'] = "Un utilisateur avec ce nom existe déjà.";
                } else {
                    // Créez l'utilisateur
                    $this->userRepository->createUser($username, $password, $role);
                    $_SESSION['flash_success'] = "Utilisateur créé avec succès.";
                }
            } else {
                $_SESSION['flash_error'] = "Tous les champs sont requis.";
            }

            // Redirigez vers le formulaire d'inscription
            header('Location: /user/showRegisterForm');
            exit;
        }
    }

    // Affiche la liste des utilisateurs
    public function list()
    {
        $users = $this->userRepository->findAllUsers();
        $this->render('dashboard/users/list', ['title' => 'Liste des utilisateurs', 'users' => $users], true);
    }

    // Affiche le formulaire pour modifier un utilisateur
    public function edit(int $id)
    {
        $user = $this->userRepository->findUserById($id);
        if (!$user) {
            $_SESSION['flash_error'] = "Utilisateur introuvable.";
            header('Location: /user/list');
            exit;
        }

        $this->render('dashboard/users/edit', ['title' => "Modifier l'utilisateur", 'user' => $user], true);
    }

    // Met à jour un utilisateur
    public function update(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? null;
            $role = $_POST['role'] ?? null;
    
            if (!empty($username) && !empty($role)) {
                $data = [
                    'username' => $username,
                    'role' => $role,
                ];
    
                $success = $this->userRepository->updateUser($id, $data);
                if ($success) {
                    $_SESSION['flash_success'] = "Utilisateur mis à jour avec succès.";
                } else {
                    $_SESSION['flash_error'] = "Échec de la mise à jour de l'utilisateur.";
                }
            } else {
                $_SESSION['flash_error'] = "Tous les champs sont requis.";
            }
    
            header('Location: /user/list');
            exit;
        }
    }
    
    
    
    // Supprime un utilisateur
    public function delete(int $id)
    {
        $success = $this->userRepository->deleteUser($id);
        if ($success) {
            $_SESSION['flash_success'] = "Utilisateur supprimé avec succès.";
        } else {
            $_SESSION['flash_error'] = "Échec de la suppression de l'utilisateur.";
        }

        header('Location: /user/list');
        exit;
    }

    // Déconnecte l'utilisateur
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /');
        exit;
    }

}