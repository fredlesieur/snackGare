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

            <a href="/" class="navbar-brand">
                <img class="logo" src="/assets/logo/logo_snack.png" alt="Snack de la Gare logo">
            </a>
        </div>
        <a href="/user/logout" class="logout">Déconnexion</a>
    </nav>

    <!-- Conteneur principal -->
    <div class="dashboard-container">
        <aside class="sidebar">
            <ul>
                <!-- Accueil -->
                <li>
                    <a href="/dashboard/index" class="btn-link">Accueil</a>
                </li>

                <!-- Utilisateurs -->
                <li>
                    <a class="btn-link" data-bs-toggle="collapse" href="#utilisateurs-menu" role="button" aria-expanded="false" aria-controls="utilisateurs-menu">
                        Utilisateurs
                    </a>
                    <ul class="collapse" id="utilisateurs-menu">
                        <li><a href="/user/showRegisterForm">Créer un utilisateur</a></li>
                        <li><a href="/user/list">Lister les utilisateurs</a></li>
                    </ul>
                </li>

                <!-- Horaires -->
                <li>
                    <a class="btn-link" data-bs-toggle="collapse" href="#horaires-menu" role="button" aria-expanded="false" aria-controls="horaires-menu">
                        Horaires
                    </a>
                    <ul class="collapse" id="horaires-menu">
                        <li><a href="/horaire/list">Lister les horaires</a></li>
                        <li><a href="/horaire/showAddForm">Ajouter un horaire</a></li>
                    </ul>
                </li>

                <!-- Page d'accueil -->
                <li>
                    <a class="btn-link" data-bs-toggle="collapse" href="#accueil-menu" role="button" aria-expanded="false" aria-controls="accueil-menu">
                        Page d'accueil
                    </a>
                    <ul class="collapse" id="accueil-menu">
                        <li><a href="/accueil/list">Liste des éléments</a></li>
                        <li><a href="/accueil/add">Ajouter un élément</a></li>
                    </ul>
                </li>

                <!-- offres -->
                <li>
                    <a class="btn-link" data-bs-toggle="collapse" href="#offre-menu" role="button" aria-expanded="false" aria-controls="offre-menu">
                       Offres
                    </a>
                    <ul class="collapse" id="offre-menu">
                        <li><a href="/offre/list">Lister les Offres</a></li>
                        <li><a href="/offre/show">Ajouter une offre</a></li>
                    </ul>
                </li>
                <!-- Avis -->
                <li>
                    <a class="btn-link" data-bs-toggle="collapse" href="#avis-menu" role="button" aria-expanded="false" aria-controls="avis-menu">
                        Avis
                    </a>
                    <ul class="collapse" id="avis-menu">
                        <li><a href="/avis/listPending">Lister les avis</a></li>
                    </ul>
                </li>


                <!-- Menu -->
                <li>
                    <a class="btn-link" data-bs-toggle="collapse" href="#menu-categories" role="button" aria-expanded="false" aria-controls="menu-categories">
                        Menu
                    </a>
                    <ul class="collapse" id="menu-categories">
                        <!-- Burgers -->
                        <li>
                            <a class="btn-link" data-bs-toggle="collapse" href="#menu-burgers" role="button" aria-expanded="false" aria-controls="menu-burgers">
                                Burgers
                            </a>
                            <ul class="collapse" id="menu-burgers">
                                <li><a href="/burger/list">Lister les burgers</a></li>
                                <li><a href="/burger/add">Ajouter un burger</a></li>
                            </ul>
                        </li>

                        <!-- Tacos -->
                        <li>
                            <a class="btn-link" data-bs-toggle="collapse" href="#menu-tacos" role="button" aria-expanded="false" aria-controls="menu-tacos">
                                Tacos
                            </a>
                            <ul class="collapse" id="menu-tacos">
                                <li><a href="/tacos/list">Lister les tacos</a></li>
                                <li><a href="/tacos/add">Ajouter un taco</a></li>
                            </ul>
                        </li>

                        <!-- Kebabs -->
                        <li>
                            <a class="btn-link" data-bs-toggle="collapse" href="#menu-kebabs" role="button" aria-expanded="false" aria-controls="menu-kebabs">
                                Kebabs
                            </a>
                            <ul class="collapse" id="menu-kebabs">
                                <li><a href="/kebab/list">Lister les kebabs</a></li>
                                <li><a href="/kebab/add">Ajouter un kebab</a></li>
                            </ul>
                        </li>

                        <!-- Salades -->
                        <li>
                            <a class="btn-link" data-bs-toggle="collapse" href="#menu-salades" role="button" aria-expanded="false" aria-controls="menu-salades">
                                Salades
                            </a>
                            <ul class="collapse" id="menu-salades">
                                <li><a href="/salade/list">Lister les salades</a></li>
                                <li><a href="/salade/add">Ajouter une salade</a></li>
                            </ul>
                        </li>

                        <!-- Snacks -->
                        <li>
                            <a class="btn-link" data-bs-toggle="collapse" href="#menu-snacks" role="button" aria-expanded="false" aria-controls="menu-snacks">
                                Snacks
                            </a>
                            <ul class="collapse" id="menu-snacks">
                                <li><a href="/snack/list">Lister les snacks</a></li>
                                <li><a href="/snack/add">Ajouter un snack</a></li>
                            </ul>
                        </li>

                        <!-- Boissons -->
                        <li>
                            <a class="btn-link" data-bs-toggle="collapse" href="#menu-boissons" role="button" aria-expanded="false" aria-controls="menu-boissons">
                                Boissons
                            </a>
                            <ul class="collapse" id="menu-boissons">
                                <li><a href="/boisson/list">Lister les boissons</a></li>
                                <li><a href="/boisson/add">Ajouter une boisson</a></li>
                            </ul>
                        </li>
                        <!--  Options -->
                        <li>
                            <a class="btn-link" data-bs-toggle="collapse" href="#menu-options" role="button" aria-expanded="false" aria-controls="menu-options">
                                Options
                            </a>
                            <ul class="collapse" id="menu-options">
                                <li><a href="/option/list">Lister les options</a></li>
                                <li><a href="/option/add">Ajouter une option</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <!-- Images -->
                <li>
                    <a class="btn-link" data-bs-toggle="collapse" href="#images-menu" role="button" aria-expanded="false" aria-controls="images-menu">
                        Images
                    </a>
                    <ul class="collapse" id="images-menu">
                        <li><a href="/image/list">Liste des images</a></li>
                        <li><a href="/image/add">Ajouter une image</a></li>
                    </ul>
                </li>
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