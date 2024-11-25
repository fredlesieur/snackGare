<?php

namespace App\Controllers;

class ImageController extends Controller
{
    public function serveBorder()
{
    $file = dirname(__DIR__, 2) . '/Public/assets/images/decorative-border.svg';

    // Vérifiez si le fichier existe
    if (!file_exists($file)) {
        header("HTTP/1.0 404 Not Found");
        echo "Fichier introuvable : " . $file;
        exit;
    }

    // Définit l'en-tête MIME pour les fichiers SVG
    header("Content-Type: image/svg+xml");
    header("Content-Length: " . filesize($file));

    // Lit et affiche le fichier
    readfile($file);
    exit;
}


}

