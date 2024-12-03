<h2>Modifier une Option</h2>
<form method="post" action="/offre/add">
    <input type="hidden" name="id" value="<?= htmlspecialchars($option['id']); ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($option['name']); ?>" required>

    <label>Description :</label>
    
    
    <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($option['description']); ?></textarea>
    <label>Prix :</label>
    <input type="number" step="0.01" name="prix" class="form-control" value="<?= htmlspecialchars($option['prix']); ?>">

    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>
