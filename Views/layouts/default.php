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
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <img class="logo" src="/assets/logo/logo_snack.png" alt="Snack de la Gare logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contacts</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menus">Menus</a></li>
                    <li class="nav-item"><a class="nav-link" href="/avis">Avis</a></li>
                    <?php if (isset($_SESSION['id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="/dashboard/index">Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/logout">Déconnexion</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/user/showLoginForm">Connexion</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="image-container">
        <img class="burger-image" src="/assets/logo/burger.webp" alt="Burger">
        <div class="command-text">
            <h2 class="size">Commander</h2>
            <div class="phone-container">
                <i class="fa-solid fa-phone-volume phone-icon" aria-hidden="true"></i>
                <span class="size2">04 76 38 59 22</span>
            </div>
        </div>
    </div>

    </header>

    <main id="main-page" class="w-auto mt-4">
        <?= $content ?>
    </main>
    <!-- footer -->
    <footer class="footer">
        <!-- Liens réseaux sociaux -->
        <div class="social-icons ">
            <a href="https://www.facebook.com" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram p-3"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
        </div>

        <!-- Horaires d'ouverture -->
        <p class="hours">
    <?php if (isset($horaires) && !empty($horaires)): ?>
        <?php foreach ($horaires as $horaire): ?>
            <?= htmlspecialchars($horaire['jours']) ?> 
            <?php if ($horaire['opening_time'] === null || $horaire['closing_time'] === null): ?>
                Fermé<br>
            <?php else: ?>
                 <?= date('H:i', strtotime($horaire['opening_time'])) ?> 
                 à <?= date('H:i', strtotime($horaire['closing_time'])) ?><br>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <em>Horaires non disponibles</em>
    <?php endif; ?>
</p>


        <!-- Adresse et numéro de téléphone -->
        <p class="address">
            95 route de St Lattier<br>
            38840 St Hilaire du Rosier<br>
            <a href="tel:0476385922">04 76 38 59 22</a>
        </p>

        <!-- Liens légaux -->
        <div class="legal-links">
            <a href="/footer/mentionsLegales" class="link">Mentions légales</a> |
            <a href="/footer/rgpd" class="link">RGPD</a> |
            <a href="/footer/cgu" class="link">CGU</a>
        </div>

        <!-- Copyright -->
        <p class="copyright">
            &copy; 2024 - Snack de la gare
        </p>
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