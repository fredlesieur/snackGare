<h1>Ajouter un Burger</h1>
<form class="register" method="post" action="/burger/save">
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
    <label>Nom :</label>
    <input type="text" name="name" value="" required>
    <label>Description :</label>
    <textarea name="description"></textarea>
    <label>Prix :</label>
    <input type="number" step="0.01" name="price" value="" required>
    <label>Prix Menu :</label>
    <input type="number" step="0.01" name="price_menu" value="" required>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
