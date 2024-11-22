<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Jour</th>
            <th>Heure d'ouverture (Midi)</th>
            <th>Heure de fermeture (Midi)</th>
            <th>Heure d'ouverture (Soir)</th>
            <th>Heure de fermeture (Soir)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($horaires)): ?>
            <?php foreach ($horaires as $horaire): ?>
                <tr>
                    <td><?= htmlspecialchars($horaire['id']) ?></td>
                    <td><?= htmlspecialchars($horaire['jours']) ?></td>
                    <td><?= $horaire['opening_time_lunch'] !== null ? htmlspecialchars($horaire['opening_time_lunch']) : 'Fermé' ?></td>
                    <td><?= $horaire['closing_time_lunch'] !== null ? htmlspecialchars($horaire['closing_time_lunch']) : 'Fermé' ?></td>
                    <td><?= $horaire['opening_time_dinner'] !== null ? htmlspecialchars($horaire['opening_time_dinner']) : 'Fermé' ?></td>
                    <td><?= $horaire['closing_time_dinner'] !== null ? htmlspecialchars($horaire['closing_time_dinner']) : 'Fermé' ?></td>
                    <td>
                        <a href="/dashboard/editHoraire/<?= htmlspecialchars($horaire['id']) ?>" class="btn btn-primary btn-sm">Modifier</a>
                        <a href="/dashboard/deleteHoraire/<?= htmlspecialchars($horaire['id']) ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Aucun horaire disponible.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


