<h2>Ajouter une Option</h2>
<form class="register" method="post" action="/option/add">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Catégorie :</label>
    <input type="text" name="category" class="form-control" required>

    <label>Description :</label>
    <textarea id="description" name="description" rows="4" cols="50"required></textarea>

    <label>Prix (si applicable) :</label>
    <input type="number" step="0.01" name="price" class="form-control">

    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
</form>
