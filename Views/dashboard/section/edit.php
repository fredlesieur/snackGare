<form action="/section/update/<?= $section['id'] ?>" method="POST" enctype="multipart/form-data">
    
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($section['title']) ?>" required>

    <label for="content">Contenu :</label>
    <textarea name="content" id="content" required><?= htmlspecialchars($section['content']) ?></textarea>

    <label for="page_id">Page :</label>
    <input type="number" name="page_id" id="page_id" value="<?= $section['page_id'] ?>" required>

    <label for="display_order">Ordre d'affichage :</label>
    <input type="number" name="display_order" id="display_order" value="<?= $section['display_order'] ?>">

    <label for="image_url">Image :</label>
    <?php if (!empty($section['image_id'])): ?>
        <img src="<?= $section['image_url'] ?>" alt="Image actuelle" style="max-width: 200px;">
    <?php endif; ?>
    <input type="file" name="image_url" id="image_url">

    <button type="submit">Mettre à jour</button>
</form>

