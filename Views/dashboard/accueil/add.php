<form method="POST" action="/accueil/add" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Contenu</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
    </div>

    <div class="mb-3">
        <label for="display_order" class="form-label">Ordre d'affichage</label>
        <input type="number" name="display_order" id="display_order" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="image_ids" class="form-label">Images associées</label>
        <div class="image-grid">
            <?php foreach ($images as $image): ?>
                <label class="image-item">
                    <input type="checkbox" name="image_ids[]" value="<?= $image['id'] ?>" style="display: none;">
                    <img src="<?= htmlspecialchars($image['url']); ?>" 
                         alt="<?= htmlspecialchars($image['alt_text']); ?>" 
                         class="img-thumbnail">
                </label>
            <?php endforeach; ?>
        </div>
        <small class="form-text text-muted">Cliquez sur les images pour les sélectionner.</small>
    </div>

    <div class="mb-3">
        <label for="new_image" class="form-label">Ajouter une nouvelle image</label>
        <input type="file" class="form-control" id="new_image" name="new_image">
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

