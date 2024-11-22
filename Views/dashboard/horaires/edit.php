<h1>Modifier un horaire</h1>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<form action="/dashboard/updateHoraire/<?= htmlspecialchars($horaire['id']) ?>" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <div class="form-group">
        <label for="jours">Jour</label>
        <input type="text" name="jours" id="jours" class="form-control" value="<?= htmlspecialchars($horaire['jours']) ?>" required>
    </div>
    <div class="form-group">
        <label for="opening_time_lunch">Heure d'ouverture (Midi)</label>
        <input type="time" name="opening_time_lunch" id="opening_time_lunch" class="form-control" value="<?= $horaire['opening_time_lunch'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="closing_time_lunch">Heure de fermeture (Midi)</label>
        <input type="time" name="closing_time_lunch" id="closing_time_lunch" class="form-control" value="<?= $horaire['closing_time_lunch'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="opening_time_dinner">Heure d'ouverture (Soir)</label>
        <input type="time" name="opening_time_dinner" id="opening_time_dinner" class="form-control" value="<?= $horaire['opening_time_dinner'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="closing_time_dinner">Heure de fermeture (Soir)</label>
        <input type="time" name="closing_time_dinner" id="closing_time_dinner" class="form-control" value="<?= $horaire['closing_time_dinner'] ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="is_closed">Fermé ?</label>
        <input type="checkbox" name="is_closed" id="is_closed" value="1" <?= isset($horaire['is_closed']) && $horaire['is_closed'] ? 'checked' : '' ?>>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
