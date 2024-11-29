<h2>Ajouter une Option</h2>
<form method="post" action="/option/save">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Catégorie :</label>
    <input type="text" name="category" class="form-control" required>

    <label>Description :</label>
    <input type="text" name="description" class="form-control" required>

    <label>Prix (si applicable) :</label>
    <input type="number" step="0.01" name="price" class="form-control">

    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
</form>