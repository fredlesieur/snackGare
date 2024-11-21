<h2>Ajouter une section</h2>
<form action="/dashboard/sections/store" method="post" enctype="multipart/form-data">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" required>

    <label for="content">Contenu :</label>
    <textarea name="content" id="content" required></textarea>

    <label for="image">Image :</label>
    <input type="file" name="image" id="image" required>

    <button type="submit">Ajouter</button>
</form>
