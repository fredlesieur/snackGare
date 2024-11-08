<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Config\Main;
use Dotenv\Dotenv;

// Définir la constante ROOT pour la racine du projet
define('ROOT', dirname(__DIR__) . '/');

// Inclure l'autoloader de l'application
require_once ROOT . 'Autoloader.php';
App\Autoloader::register();

// Inclure l'autoloader de Composer
require_once ROOT . '/vendor/autoload.php';

// Vérifier si le fichier .env existe avant de tenter de le charger
if (file_exists(ROOT . '/.env')) {
    $dotenv = Dotenv::createImmutable(ROOT);
    $dotenv->load();
}

// Démarrer l'application
$app = new Main;
$app->start();
