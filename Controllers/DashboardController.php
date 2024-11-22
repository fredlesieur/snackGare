<?php

namespace App\Controllers;
use App\Repositories\HoraireRepository;

class DashboardController extends Controller
{
    private $horaireRepository;

    public function __construct()
    {
        parent::__construct();
        $this->horaireRepository = new HoraireRepository();
    }
    public function index()
    {
        $this->render('dashboard/home', ['title' => 'Bienvenue sur le Dashboard'],true);
    }

    public function showRegisterForm()
    {
        // Affiche le formulaire d'inscription dans le layout dashboard
        $this->render('dashboard/register', ['title' => 'Créer un utilisateur'], true);
    }
    public function showHorairesForm()
    {
        $this->render('dashboard/horaires/add', [
            'title' => 'Ajouter des horaires'
        ], true);
    }
    public function addHoraire()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $jours = $_POST['jours'] ?? null;
        $openingLunch = $_POST['opening_time_lunch'] ?? null;
        $closingLunch = $_POST['closing_time_lunch'] ?? null;
        $openingDinner = $_POST['opening_time_dinner'] ?? null;
        $closingDinner = $_POST['closing_time_dinner'] ?? null;
        $isClosed = isset($_POST['is_closed']) ? (int)$_POST['is_closed'] : 0;

        // Validation simple
        if (empty($jours)) {
            $_SESSION['error'] = 'Le champ "jours" est obligatoire.';
            header('Location: /dashboard/showHorairesForm');
            exit();
        }

        // Ajout dans la base de données
        $result = $this->horaireRepository->create([
            'jours' => $jours,
            'opening_time_lunch' => $openingLunch,
            'closing_time_lunch' => $closingLunch,
            'opening_time_dinner' => $openingDinner,
            'closing_time_dinner' => $closingDinner,
            'is_closed' => $isClosed,
        ]);

        if ($result) {
            $_SESSION['success'] = 'Horaire ajouté avec succès.';
        } else {
            $_SESSION['error'] = 'Erreur lors de l\'ajout de l\'horaire.';
        }

        header('Location: /dashboard/showHoraires');
        exit();
    }

    // Si la méthode HTTP n'est pas POST, redirige vers le formulaire
    header('Location: /dashboard/showHorairesForm');
    exit();
}


    public function showHoraires()
{
    // Récupérer tous les horaires depuis le repository
    $horaires = $this->horaireRepository->findAllHoraires();

    // Rendre la vue pour lister les horaires
    $this->render('dashboard/horaires/list', [
        'title' => 'Lister les horaires',
        'horaires' => $horaires,
    ], true);
}

public function editHoraire($id)
{
    // Vérifier si l'ID est valide
    $horaire = $this->horaireRepository->find($id);
    if (!$horaire) {
        $_SESSION['error'] = "Horaire introuvable.";
        header('Location: /dashboard/showHoraires');
        exit();
    }

    // Charger la vue d'édition
    $this->render('dashboard/horaires/edit', [
        'title' => 'Modifier un horaire',
        'horaire' => $horaire,
    ], true);
}
public function updateHoraire($id)
{
    // Vérifier la méthode HTTP
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $jours = $_POST['jours'] ?? null;
        $openingTimeLunch = $_POST['opening_time_lunch'] ?? null;
        $closingTimeLunch = $_POST['closing_time_lunch'] ?? null;
        $openingTimeDinner = $_POST['opening_time_dinner'] ?? null;
        $closingTimeDinner = $_POST['closing_time_dinner'] ?? null;
        $isClosed = isset($_POST['is_closed']) ? 1 : 0;

        // Validation simple
        if (empty($jours)) {
            $_SESSION['error'] = "Le champ 'Jour' est obligatoire.";
            header("Location: /dashboard/editHoraire/$id");
            exit();
        }

        // Mettre à jour l'horaire dans la base de données
        $result = $this->horaireRepository->update($id, [
            'jours' => $jours,
            'opening_time_lunch' => $openingTimeLunch,
            'closing_time_lunch' => $closingTimeLunch,
            'opening_time_dinner' => $openingTimeDinner,
            'closing_time_dinner' => $closingTimeDinner,
            'is_closed' => $isClosed,
        ]);

        // Vérification du succès de la mise à jour
        if ($result) {
            $_SESSION['success'] = "L'horaire a été mis à jour avec succès.";
        } else {
            $_SESSION['error'] = "Une erreur s'est produite lors de la mise à jour.";
        }

        header('Location: /dashboard/showHoraires');
        exit();
    } else {
        // Rediriger si la méthode n'est pas POST
        $_SESSION['error'] = "Méthode non autorisée.";
        header('Location: /dashboard/showHoraires');
        exit();
    }
}

}
