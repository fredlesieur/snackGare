<h1>Liste des images</h1>

<!-- Messages de succès ou d'erreur -->
<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['flash_success']); ?>
        <?php unset($_SESSION['flash_success']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['flash_error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['flash_error']); ?>
        <?php unset($_SESSION['flash_error']); ?>
    </div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Texte alternatif</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($images)): ?>
            <?php foreach ($images as $index => $image): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td>
                        <img src="<?= htmlspecialchars($image['url']); ?>" 
                             alt="<?= htmlspecialchars($image['alt_text']); ?>" 
                             width="100" height="100" style="object-fit: cover;">
                    </td>
                    <td><?= htmlspecialchars($image['alt_text']); ?></td>
                    <td>
                        <a href="/image/delete/<?= htmlspecialchars($image['id']); ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Voulez-vous vraiment supprimer cette image ?');">
                           Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Aucune image trouvée.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

