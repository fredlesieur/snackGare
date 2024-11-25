<?php

namespace App\Controllers;

use App\Repositories\PageRepository;

class PageController extends Controller
{
    public function index()
    {
        $pageRepo = new PageRepository();
        $pages = $pageRepo->findAll();

        $this->render('dashboard/pages/index', compact('pages'));
    }

    public function edit(int $id, array $data)
    {
        $pageRepo = new PageRepository();
        $success = $pageRepo->update($id, $data);

        if ($success) {
            header('Location: /dashboard/pages');
        } else {
            echo "Erreur lors de la mise à jour de la page.";
        }
    }
}
