<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['success']) ?>
    </div>
    <?php unset($_SESSION['success']); // Nettoyer le message après affichage ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<h1>Laisser un avis</h1>

<form action="/avis/add" method="post">
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <div class="mb-3">
        <label for="nom" class="form-label">Votre nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="commentaire" class="form-label">Votre avis</label>
        <textarea name="commentaire" id="commentaire" class="form-control" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>