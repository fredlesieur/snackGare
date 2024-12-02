<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1); // Activer l'enregistrement des erreurs
ini_set('error_log', __DIR__ . '/error_log.txt'); // Spécifier le fichier pour les erreurs
error_reporting(E_ALL);

use App\autoloader;
use App\Config\Main;
use Dotenv\Dotenv;

define('ROOT', dirname(__DIR__));

// Chargement de l'autoloader de Composer
 require_once ROOT . '/vendor/autoload.php';
// Inclure l' autoloader
require_once ROOT . '/Autoloader.php';
Autoloader::register();

// Charger les variables d'environnement
if (file_exists(ROOT . '/.env')) {
    $dotenv = Dotenv::createImmutable(ROOT);
    $dotenv->load();
} 
// Initialiser et démarrer l'application
$app = new Main();
$app->start();

