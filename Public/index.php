<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1); // Activer l'enregistrement des erreurs
ini_set('error_log', __DIR__ . '/error_log.txt'); // Spécifier le fichier pour les erreurs
error_reporting(E_ALL);


use App\Config\Main;
use Dotenv\Dotenv;

define('ROOT', dirname(__DIR__) . '/');

// Chargement de l'autoloader de Composer
require_once ROOT . 'vendor/autoload.php';

// Charger les variables d'environnement
if (file_exists(ROOT . '.env')) {
    $dotenv = Dotenv::createImmutable(ROOT);
    $dotenv->load();
} else {
    die("Le fichier .env est introuvable.");
}

// Initialiser et démarrer l'application
$app = new Main();
$app->start();

