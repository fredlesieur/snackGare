<h1>Liste des horaires</h1>

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
            <th>Jour</th>
            <th>Midi</th>
            <th>Soir</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($horaires)): ?>
            <?php foreach ($horaires as $index => $horaire): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($horaire['jours']); ?></td>
                    <td>
                        <?= ($horaire['closing_time_lunch'] == '00:00:00' || $horaire['closing_time_lunch'] == NULL) 
                            ? 'Fermé' 
                            : htmlspecialchars($horaire['opening_time_lunch'] . ' à ' . $horaire['closing_time_lunch']); ?>
                    </td>
                    <td>
                        <?= ($horaire['closing_time_dinner'] == '00:00:00' || $horaire['closing_time_dinner'] == NULL) 
                            ? 'Fermé' 
                            : htmlspecialchars($horaire['opening_time_dinner'] . ' à ' . $horaire['closing_time_dinner']); ?>
                    </td>
                    <td>
                        <a href="/horaire/edit/<?= htmlspecialchars($horaire['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/horaire/delete/<?= htmlspecialchars($horaire['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun horaire trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
