<h1 class="container-fluid banner pt-5 pb-5"><?= $title; ?></h1>


    <!-- Menu de navigation du dashboard -->
    <nav class="dashboard-nav">
        <ul>
            <?php if ($_SESSION['role'] && $_SESSION['role'] == 'admin'): ?>
                <li><a class="btn button w-50 m-2" href="/user/showRegisterForm">Créer un utilisateur</a></li>
                <li><a class="btn button w-50 m-2" href="/user/listUsers">Liste des utilisateurs</a></li>
            <?php endif; ?>
        </ul>