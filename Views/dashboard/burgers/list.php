<div class="burger-list">
    <h2 class="text-center mb-4">Liste des Burgers</h2>

    <?php if (isset($_SESSION['flash_success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['flash_success']; ?>
            <?php unset($_SESSION['flash_success']); // Supprimer après affichage ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['flash_error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['flash_error']; ?>
            <?php unset($_SESSION['flash_error']); // Supprimer après affichage ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($burgers)): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Prix Menu</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($burgers as $burger): ?>
                    <tr>
                        <td><?= htmlspecialchars($burger['name']); ?></td>
                        <td><?= htmlspecialchars($burger['description']); ?></td>
                        <td><?= htmlspecialchars($burger['price']); ?> €</td>
                        <td><?= htmlspecialchars($burger['price_menu']); ?> €</td>
                        <td>
                            <a href="/burger/edit/<?= htmlspecialchars($burger['id']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="/burger/delete/<?= htmlspecialchars($burger['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce burger ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Aucun burger trouvé.</div>
    <?php endif; ?>
</div>

