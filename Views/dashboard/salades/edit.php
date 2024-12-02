<h2>Modifier une Salade</h2>
<form method="post" action="/salade/save">
    <input type="hidden" name="id" value="<?= htmlspecialchars($salade['id']); ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($salade['name']); ?>" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($salade['description']); ?></textarea>

    <label>Prix :</label>
    <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($salade['price']); ?>" required>

    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>
