<?php

namespace App\Controllers;

use App\Services\UserService;
use App\Utils\Redirect;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        parent::__construct();
        $this->userService = new UserService();
    }

    public function showLoginForm()
    {
        $this->render('login', ['title' => 'Connexion']);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->userService->authenticateUser($_POST['username'], $_POST['password']);

            if ($result['success']) {
                $_SESSION['id'] = $result['user']['id'];
                $_SESSION['role'] = $result['user']['role'];
                Redirect::to('/dashboard/index');
            } else {
                $_SESSION['error'] = $result['message'];
                Redirect::to('/user/showLoginForm');
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        Redirect::to('/');
    }

    public function showRegisterForm()
    {
        $this->render('dashboard/users/register', ['title' => 'Créer un utilisateur'], true);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->userService->registerUser($_POST);

            if ($result['success']) {
                $_SESSION['success'] = $result['message'];
            } else {
                $_SESSION['error'] = $result['message'];
            }

            Redirect::to('/user/showRegisterForm');
        }
    }

    public function list()
    {
        $users = $this->userService->getAllUsers();
        $this->render('dashboard/users/list', ['title' => 'Liste des utilisateurs', 'users' => $users], true);
    }

    public function edit(int $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            $_SESSION['flash_error'] = "Utilisateur introuvable.";
            Redirect::to('/user/list');
            return;
        }

        $this->render('dashboard/users/edit', [
            'title' => "Modifier l'utilisateur",
            'user' => $user,
        ], true);
    }

    public function update(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'] ?? null,
                'role' => $_POST['role'] ?? null,
            ];

            $result = $this->userService->updateUser($id, $data);

            if ($result['success']) {
                $_SESSION['flash_success'] = $result['message'];
            } else {
                $_SESSION['flash_error'] = $result['message'];
            }

            Redirect::to('/user/list');
        } else {
            $_SESSION['flash_error'] = "Méthode non autorisée.";
            Redirect::to('/user/list');
        }
    }

    public function delete(int $id)
    {
        $result = $this->userService->deleteUser($id);

        if ($result['success']) {
            $_SESSION['flash_success'] = $result['message'];
        } else {
            $_SESSION['flash_error'] = $result['message'];
        }

        Redirect::to('/user/list');
    }
}
