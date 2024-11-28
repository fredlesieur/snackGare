<h1>Liste des avis reçu</h1>

<?php if (!empty($reviews)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Commentaire</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= htmlspecialchars($review['nom']) ?></td>
                    <td><?= htmlspecialchars($review['commentaire']) ?></td>
                    <td><?= htmlspecialchars($review['dateavis']) ?></td>
                    <td>
                        <!-- Bouton Valider -->
                        <form action="/avis/approve" method="post" style="display:inline;">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($review['id']) ?>">
                            <button type="submit" class="btn btn-success">Valider</button>
                        </form>
                        <!-- Bouton Supprimer -->
                        <form action="/avis/delete" method="post" style="display:inline;">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($review['id']) ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun avis en attente.</p>
<?php endif; ?>
