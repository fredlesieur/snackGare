<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard'; ?></title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Menu latéral -->
        <nav class="sidebar">
            <ul>
                <li><a href="/dashboard/index">Accueil</a></li>
                <li><a href="/user/showRegisterForm">Créer un utilisateur</a></li>
                <li><a href="/dashboard/listUsers">Lister les utilisateurs</a></li>
                <li><a href="/user/logout">Déconnexion</a></li>
            </ul>
        </nav>

        <!-- Contenu principal -->
        <main class="content">
            <?= $content ?? '<p>Contenu vide.</p>'; ?>
        </main>
    </div>
</body>
</html>


