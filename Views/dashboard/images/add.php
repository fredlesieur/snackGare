<h1>Ajouter une image</h1>
<form class="register" method="POST" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" required>
    </div>
    <div class="form-group">
        <label for="alt_text">Texte alternatif</label>
        <input type="text" name="alt_text" id="alt_text" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
