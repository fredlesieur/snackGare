<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="author" content="SnackGare">
    <meta name="description" content="Snack de la gare une restauration rapide de qualité avec des produits frais">
    <meta name="keywords" content="restaurant, tacos, kebab, burger, frites, restauration rapide">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Préchargement des polices -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Risque&display=swap" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Risque&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" as="style">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <!-- Liens vers les polices Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Risque&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="/assets/css/dashboard.css">

    <title> Snack de la Gare</title>
</head>

<body>
    <!-- Navigation du tableau de bord -->
    <nav class="dashboard-nav">
        <div class="dashboard-header">
            <img class="logo" src="/assets/logo/logo_snack.png" alt="Logo">
        </div>
        <a href="/user/logout" class="logout">Déconnexion</a>
    </nav>

    <!-- Conteneur principal -->
    <div class="dashboard-container">
        <aside class="sidebar">
            <ul>
                <li><a href="/dashboard/index" class="btn-link">Accueil</a></li>
                <li><a href="/user/showRegisterForm" class="btn-link">Créer un utilisateur</a></li>
                <li><a href="/user/list" class="btn-link">Lister les utilisateurs</a></li>
                <li><a href="/page/create" class="btn-link">Créer une page</a></li>
                <li><a href="/page/list" class="btn-link">Lister les pages</a></li>
            </ul>
        </aside>
        <main class="content">
            <?= $content ?? '' ?>
        </main>
    </div>
  <!-- Scripts JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- jQuery et DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <?php if (isset($script)) {
        echo $script;
    } ?>
</body>

</html>



