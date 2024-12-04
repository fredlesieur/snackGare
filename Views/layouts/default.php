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
    <nav class="navbar navbar-expand-xl fixed-top">
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
                    <li class="nav-item"><a class="nav-link" href="/offre">Offres</a></li>

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
          <h2 class="size">  <a href="/contact">Commander</a></h2>
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
            <h2><a href="/contact">Horaires d'ouverture</a></h2>
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
            <h2><a href="/contact">Contact</a></h2>
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
 <!-- Modal Mentions Légales -->
 <div class="modal fade" id="modalMentionsLegales" tabindex="-1" aria-labelledby="modalMentionsLegalesLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalMentionsLegalesLabel">Mentions Légales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> Propriétaire du site : Snack de La Gare <br>
                            Nom du responsable : Walter MORELL <br>

                            Adresse : 95 route de St Lattier 38840 St Hilaire du Rosier <br>

                            Téléphone : 04 76 38 59 22 <br>
                            Email : snackdelagare@gmail.com<br>
                            Numéro SIRET : 009352696 <br>
                            RCS : saint hilaire <br>
                            Directeur de la publication : Frédéric LESIEUR <br>

                            Hébergement : <br>
                            Nom de l’hébergeur : Heroku <br>
                            Adresse de l’hébergeur : San Francisco, Californie, États-Unis <br>

                            Propriété intellectuelle : <br>
                            Le contenu du site (textes, images, graphismes, logo, etc.) est la propriété exclusive du Snack de la Gare et est protégé par les lois relatives à la propriété intellectuelle. Toute reproduction totale ou partielle est strictement interdite sans l'accord préalable du Snack de la Gare. <br>
                            <br>
                            Limitation de responsabilité : <br>
                            Le snack de la Gare ne saurait être tenue responsable des dommages directs ou indirects résultant de l'accès ou de l'utilisation de ce site.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalRGPD" tabindex="-1" aria-labelledby="modalRGPDLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalRGPDLabel">Politique de Confidentialité (RGPD)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>1. **Collecte des données** <br>
                            Les informations collectées via le formulaire de contact ou lors de la soumission d'avis (nom, email, etc.) sont nécessaires pour répondre aux mails des utilisateurs et afficher des avis sur le zoo. Ces données sont traitées par Le Snack de la Gare.<br>
                            <br>
                            2. **Utilisation des données** <br>
                            Les données personnelles recueillies sur le site sont utilisées pour répondre aux demandes par email et pour permettre l'affichage d'avis des clients. <br>
                            <br>
                            3. **Conservation des données** <br>
                            Les données collectées sont conservées pendant une durée de 1 an à compter du dernier contact avec l'utilisateur.<br>
                            <br>
                            4. **Droit d'accès, de rectification et d'opposition** <br>
                            Conformément à la loi « Informatique et Libertés », vous disposez d’un droit d’accès, de rectification, de suppression et d'opposition des données vous concernant. Vous pouvez exercer ce droit en nous contactant à l'adresse suivante : contact.snakdelagare@gmail.com.<br>
                            <br>
                            5. **Cookies** <br>
                            Le site utilise des cookies pour améliorer l'expérience utilisateur et mesurer l'audience. Vous pouvez configurer votre navigateur pour refuser les cookies.<br>
                            <br>
                            6. **Transmission des données à des tiers** <br>
                            Le Snack de la Gare s'engage à ne pas vendre, louer ou céder les données personnelles à des tiers sans consentement préalable, sauf obligation légale.<br>
                            <br>
                            7. **Hébergement des données** <br>
                            Les données sont hébergées par Heroku, situé à San Francisco, Californie, États-Unis.<br>
                            <br>
                            8. **Sécurité des données** <br>
                            Le Snack de la Gare met en œuvre toutes les mesures techniques et organisationnelles pour protéger les données personnelles contre toute altération, perte ou accès non autorisé.
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal CGU -->
        <div class="modal fade" id="modalCGU" tabindex="-1" aria-labelledby="modalCGULabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCGULabel">Conditions Générales d'Utilisation (CGU)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> 1. **Objet** <br>
                            Les présentes CGU régissent l'accès et l'utilisation du site le Snack de la Gare. En accédant à ce site, l'utilisateur accepte sans réserve les présentes conditions. <br>
                            <br>
                            2. **Accès au site** <br>
                            L'accès au site est possible 24/7, sauf interruption, programmée ou non, pour des raisons de maintenance ou en cas de force majeure. le Snack de la Gare ne saurait être tenue responsable en cas de modification, interruption ou suspension des services. <br>
                            <br>
                            3. **Services fournis** <br>
                            Le site Snack de la Gare a pour objet de fournir des informations sur le restaurant, de répondre aux demandes des utilisateurs, et de permettre l’affichage des avis. <br>
                            <br>
                            4. **Propriété intellectuelle** <br>
                            Le contenu du site est protégé par les lois relatives à la propriété intellectuelle. Toute reproduction, diffusion, modification ou utilisation du contenu, sans l'autorisation expresse de Snack de la Gare, est interdite. <br>
                            <br>
                            5. **Responsabilité** <br>
                            L'utilisateur est seul responsable de l'utilisation des informations disponibles sur le site. Le Snack de la Gare décline toute responsabilité quant aux dommages résultant de l'utilisation des informations ou services proposés sur le site. <br>
                            <br>
                            6. **Liens hypertextes** <br>
                            Le site peut contenir des liens vers d'autres sites web. Le Snack de la Gare n'est pas responsable du contenu de ces sites tiers et décline toute responsabilité à cet égard. <br>
                            <br>
                            7. **Données personnelles** <br>
                            Les informations collectées lors de l'inscription ou de la navigation sur le site sont traitées conformément à la politique de confidentialité (voir ci-dessous). <br>
                            <br>
                            8. **Modification des CGU** <br>
                            Le Snack de la Gare se réserve le droit de modifier à tout moment les présentes CGU. Il est conseillé à l'utilisateur de les consulter régulièrement.
                        </p>
                    </div>
                </div>
            </div>
        </div>

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