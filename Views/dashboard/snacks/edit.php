<h2>Modifier un Snack</h2>
<form method="post" action="/snack/save">
    <input type="hidden" name="id" value="<?= htmlspecialchars($snack['id']); ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($snack['name']); ?>" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($snack['description']); ?></textarea>

    <label>Prix :</label>
    <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($snack['price']); ?>" required>

    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>
