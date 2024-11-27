<form method="POST" action="/accueil/update/<?= $element['id']; ?>" enctype="multipart/form-data">

    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($element['title']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Contenu</label>
        <textarea name="content" id="content" class="form-control" rows="5" required><?= htmlspecialchars($element['content']); ?></textarea>
    </div>

    <div class="mb-3">
        <label for="display_order" class="form-label">Ordre d'affichage</label>
        <input type="number" name="display_order" id="display_order" class="form-control" value="<?= $element['display_order']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="image_ids" class="form-label">Images associées</label>
        <div class="image-grid">
            <?php foreach ($images as $image): ?>
                <label class="image-item">
                    <input type="checkbox" name="image_ids[]" value="<?= $image['id'] ?>" 
                        <?= in_array($image['id'], $selectedImagesIds) ? 'checked' : '' ?>>
                    <img src="<?= htmlspecialchars($image['url']); ?>" alt="<?= htmlspecialchars($image['alt_text']); ?>" class="img-thumbnail">
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="new_image" class="form-label">Ajouter une nouvelle image (optionnel)</label>
        <input type="file" name="new_image" id="new_image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>

</form>

