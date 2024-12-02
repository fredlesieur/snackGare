<?php 
// Définir la variable $script pour charger le fichier JavaScript
$script = '<script src="/assets/javascript/hoursClosed.js"></script>';
?>

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

<form method="POST" action="/horaire/update/<?= htmlspecialchars($horaire['id']); ?>"> 
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

    <!-- Jour -->
    <div class="mb-3">
        <label for="jours" class="form-label">Jour</label>
        <input type="text" class="form-control" id="jours" name="jours" value="<?= htmlspecialchars($horaire['jours'] ?? ''); ?>" required>
    </div>

    <!-- Heure d'ouverture (Midi) -->
    <div class="mb-3">
        <label for="opening_time_lunch" class="form-label">Heure d'ouverture (Midi)</label>
        <input type="time" name="opening_time_lunch" id="opening_time_lunch" class="form-control" value="<?= isset($horaire['is_closed_lunch']) && $horaire['is_closed_lunch'] ? '' : htmlspecialchars($horaire['opening_time_lunch'] ?? ''); ?>" <?= isset($horaire['is_closed_lunch']) && $horaire['is_closed_lunch'] ? 'disabled' : ''; ?>>
    </div>

    <!-- Heure de fermeture (Midi) -->
    <div class="mb-3">
        <label for="closing_time_lunch" class="form-label">Heure de fermeture (Midi)</label>
        <input type="time" name="closing_time_lunch" id="closing_time_lunch" class="form-control" value="<?= isset($horaire['is_closed_lunch']) && $horaire['is_closed_lunch'] ? '' : htmlspecialchars($horaire['closing_time_lunch'] ?? ''); ?>" <?= isset($horaire['is_closed_lunch']) && $horaire['is_closed_lunch'] ? 'disabled' : ''; ?>>
    </div>

    <!-- Heure d'ouverture (Soir) -->
    <div class="mb-3">
        <label for="opening_time_dinner" class="form-label">Heure d'ouverture (Soir)</label>
        <input type="time" name="opening_time_dinner" id="opening_time_dinner" class="form-control" value="<?= isset($horaire['is_closed_dinner']) && $horaire['is_closed_dinner'] ? '' : htmlspecialchars($horaire['opening_time_dinner'] ?? ''); ?>" <?= isset($horaire['is_closed_dinner']) && $horaire['is_closed_dinner'] ? 'disabled' : ''; ?>>
    </div>

    <!-- Heure de fermeture (Soir) -->
    <div class="mb-3">
        <label for="closing_time_dinner" class="form-label">Heure de fermeture (Soir)</label>
        <input type="time" name="closing_time_dinner" id="closing_time_dinner" class="form-control" value="<?= isset($horaire['is_closed_dinner']) && $horaire['is_closed_dinner'] ? '' : htmlspecialchars($horaire['closing_time_dinner'] ?? ''); ?>" <?= isset($horaire['is_closed_dinner']) && $horaire['is_closed_dinner'] ? 'disabled' : ''; ?>>
    </div>

    <!-- Fermé à midi -->
    <div class="mb-3">
        <label for="is_closed_lunch" class="form-label">Fermé à midi ?</label>
        <input type="checkbox" name="is_closed_lunch" id="is_closed_lunch" value="1" <?= isset($horaire['is_closed_lunch']) && $horaire['is_closed_lunch'] ? 'checked' : ''; ?> onclick="toggleLunchTimes()">
    </div>

    <!-- Fermé le soir -->
    <div class="mb-3">
        <label for="is_closed_dinner" class="form-label">Fermé le soir ?</label>
        <input type="checkbox" name="is_closed_dinner" id="is_closed_dinner" value="1" <?= isset($horaire['is_closed_dinner']) && $horaire['is_closed_dinner'] ? 'checked' : ''; ?> onclick="toggleDinnerTimes()">
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>

