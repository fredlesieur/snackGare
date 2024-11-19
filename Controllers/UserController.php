<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        $this->renderDirect('login'); 
    }
    // Gère la connexion d'un utilisateur
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!empty($username) && !empty($password)) {
                $user = $this->userModel->findUserByUsername($username);
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
        $this->renderDirect("dashboard/register"); 
    }

    // Gère l'enregistrement d'un nouvel utilisateur
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $this->userModel->createUser($username, $password, $role);
            header('Location: /user/showLoginForm'); 
            exit;
        }
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
