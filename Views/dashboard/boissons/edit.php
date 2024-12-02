<h2>Modifier une Boisson</h2>
<form method="post" action="/boisson/save">
    <input type="hidden" name="id" value="<?= htmlspecialchars($boisson['id']); ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($boisson['name']); ?>" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($boisson['description']); ?></textarea>

    <label>Prix (Bouteille) :</label>
    <input type="number" step="0.01" name="price_bottle" class="form-control" value="<?= htmlspecialchars($boisson['price_bottle']); ?>">

    <label>Prix (Canette) :</label>
    <input type="number" step="0.01" name="price_can" class="form-control" value="<?= htmlspecialchars($boisson['price_can']); ?>">

    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>
