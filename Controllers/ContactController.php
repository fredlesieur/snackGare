<?php

namespace App\Controllers;

use App\Repositories\HoraireRepository;

class ContactController extends Controller
{
    public function index()
    {
        $horaireRepo = new HoraireRepository();
        $horairesContact = $horaireRepo->findAll(); // Horaires pour cette page uniquement
        $css = '/assets/css/contact.css';
        $this->render('contact/index', compact('horairesContact', 'css'));
    }
}

