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
    <link rel="stylesheet" href="/assets/css/default.css">

    <title> Snack de la Gare</title>
</head>

<body class="container-fluid p-3">
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-xl bg-light shadow-sm">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">
                    <img class="logo" src="" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="/habitats">Contacts</a></li>
                        <li class="nav-item"><a class="nav-link" href="/service">Menus</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Avis</a></li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li class="nav-item"><a class="nav-link" href="/dashboard/index">Tableau de bord <?= $_SESSION['role'] ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="/connexion/logout">Déconnexion</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="/connexion">Connexion</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main id="main-page" class="w-auto mt-4">
        <?= $content ?>
    </main>
<!-- footer -->
    <footer class="bg-dark text-light text-center py-3">
        <div class="footer">
            <div class="d-flex justify-content-between align-items-center first-line mb-3">
                <a href="/"><img src="/assets/logo/logo.jpg" alt="Logo Zoo" class="logo"></a>
                <div>
                    <a href="https://instagram.com" target="_blank" class="text-light mx-2" aria-label="Suivez-nous sur Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="text-light mx-2" aria-label="Suivez-nous sur Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-light mx-2" aria-label="Suivez-nous sur Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="text-light mx-2" aria-label="Regardez nos vidéos sur YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div class="second-line">
                <p class="mb-0 text-white">&copy; - Snack de la gare 2024 - Lesieur Frédéric -</p>
                <a href="/footer/mentionsLegales" class="text-light m-1">Mentions légales</a>
                <a href="/footer/rgpd" class="text-light m-1"> RGPD</a>
                <a href="/footer/cgu" class="text-light m-1">CGU</a>
            </div>
        </div>
    </footer>

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