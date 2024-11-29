<h2>Modifier une Option</h2>
<form method="post" action="/option/save">
    <input type="hidden" name="id" value="<?= htmlspecialchars($option['id']); ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Catégorie :</label>
    <input type="text" name="category" class="form-control" value="<?= htmlspecialchars($option['category']); ?>" required>

    <label>Description :</label>
    <input type="text" name="description" class="form-control" value="<?= htmlspecialchars($option['description']); ?>" required>

    <label>Prix (si applicable) :</label>
    <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($option['price']); ?>">

    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>
