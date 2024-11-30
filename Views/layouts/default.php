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
    <?php if (isset($css)) : ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($css) ?>">
    <?php endif; ?>
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
                    <li class="nav-item"><a class="nav-link" href="/home">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="/avis/form">Avis</a></li>

                    <!-- Lien connexion -->
                    <?php if (isset($_SESSION['id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="/dashboard/index">Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/logout">Déconnexion</a></li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal pour la connexion -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/user/login" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'utilisateur" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="image-container">
        <img class="burger-image" src="/assets/logo/burger.webp" alt="Burger">
        <div class="command-text">
            <h2 class="size">Commander</h2>
            <div class="phone-container">
                <i class="fa-solid fa-phone-volume phone-icon" aria-hidden="true"></i>
                <a class="size2" href="tel:0476385922">04 76 38 59 22</a>
            </div>
        </div>
    </div>

    </header>

    <main id="main-page" class="w-auto mt-4">
        <?= $content ?>
    </main>
<!-- footer -->
<footer class="footer">
    <div class="footer-sections">
        <!-- Horaires -->
        <div class="horaires">
            <h2>Horaires d'ouverture</h2>
            <?php if (!empty($_SESSION['horaires'])): ?>
                <?php foreach ($_SESSION['horaires'] as $horaire): ?>
                    <div>
                        <strong><?= htmlspecialchars($horaire['jours']) ?> :</strong>
                        <?php
                            if ($horaire['is_closed_lunch'] == 1 && $horaire['is_closed_dinner'] == 1) {
                                echo "Fermeture";
                            } else {
                                $horaires = [];
                                if ($horaire['is_closed_lunch'] != 1) {
                                    $horaires[] = date('H:i', strtotime($horaire['opening_time_lunch'])) . "-" . date('H:i', strtotime($horaire['closing_time_lunch']));
                                }
                                if ($horaire['is_closed_dinner'] != 1) {
                                    $horaires[] = date('H:i', strtotime($horaire['opening_time_dinner'])) . "-" . date('H:i', strtotime($horaire['closing_time_dinner']));
                                }
                                echo implode(" et ", $horaires);
                            }
                        ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <em>Horaires non disponibles</em>
            <?php endif; ?>
        </div>

        <!-- Réseaux Sociaux -->
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
        </div>

        <!-- Contact -->
        <div class="contact">
            <h2>Contact</h2>
            <p class="addressFooter">
                95 route de St Lattier<br>
                38840 St Hilaire du Rosier<br>
                <a class="tel" href="tel:0476385922">04 76 38 59 22</a>
            </p>
        </div>
    </div>

    <!-- Liens légaux -->
    <div class="legal-links">
        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modalMentionsLegales">Mentions légales</a> |
        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modalRGPD">RGPD</a> |
        <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#modalCGU">CGU</a>
    </div>

    <!-- Copyright -->
    <div class="copyright">
        <p>&copy; 2024 - Snack de la gare</p>
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