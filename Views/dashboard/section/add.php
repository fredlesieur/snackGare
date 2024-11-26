<form action="/section/add" method="post" enctype="multipart/form-data">
    <label for="title">Titre de la section :</label>
    <input type="text" id="title" name="title" required><br>

    <label for="content">Contenu de la section :</label>
    <textarea id="content" name="content" required></textarea><br>

    <label for="page_id">ID de la page :</label>
    <input type="number" id="page_id" name="page_id" value="1" required><br>

    <label for="display_order">Ordre d'affichage :</label>
    <input type="number" id="display_order" name="display_order" required><br>

    <label for="image_url">Image :</label>
    <input type="file" name="image_url" id="image_url" required><br>

    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <button type="submit">Ajouter la section</button>
</form>
