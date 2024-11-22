<div class="horaire-list">
    <h2 class="text-center mb-4">Liste des horaires</h2>

    <?php if (isset($_SESSION['flash_success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['flash_success']; ?>
            <?php unset($_SESSION['flash_success']); // Supprimer après affichage 
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['flash_error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['flash_error']; ?>
            <?php unset($_SESSION['flash_error']); // Supprimer après affichage 
            ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($horaires)): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Jour</th>
                    <th scope="col">Midi</th>
                    <th scope="col">Soir</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($horaires as $horaire): ?>
                    <tr>
                        <td><?= htmlspecialchars($horaire['jours']); ?></td>
                        <td>
                            <?= ($horaire['closing_time_lunch'] == '00:00:00' || $horaire['closing_time_lunch'] == NULL) ? 'Fermé' : $horaire['opening_time_lunch'] . ' à ' . $horaire['closing_time_lunch']; ?>
                        </td>
                        <td>
                            <?= ($horaire['closing_time_dinner'] == '00:00:00' || $horaire['closing_time_dinner'] == NULL) ? 'Fermé' : $horaire['opening_time_dinner'] . ' à ' . $horaire['closing_time_dinner']; ?>
                        </td>

                        <td>
                            <a href="/horaire/edit/<?= htmlspecialchars($horaire['id']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="/horaire/delete/<?= htmlspecialchars($horaire['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Aucun horaire trouvé.</div>
    <?php endif; ?>
</div>