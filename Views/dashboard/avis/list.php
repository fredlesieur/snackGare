<h1>Liste des avis reçus</h1>

<!-- Messages de succès ou d'erreur -->
<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']); ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Commentaire</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $index => $review): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($review['nom']) ?></td>
                    <td><?= htmlspecialchars($review['commentaire']) ?></td>
                    <td><?= htmlspecialchars($review['dateavis']) ?></td>
                    <td>
                        <!-- Bouton Valider -->
                        <form action="/avis/approve" method="post" style="display:inline;">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($review['id']) ?>">
                            <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        </form>
                        <!-- Bouton Supprimer -->
                        <form action="/avis/delete" method="post" style="display:inline;">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($review['id']) ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun avis en attente.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

