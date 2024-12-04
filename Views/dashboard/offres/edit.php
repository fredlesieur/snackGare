<h2>Modifier une Option</h2>
<form action="/offre/edit/<?= isset($offre['_id']) ? htmlspecialchars($offre['_id']) : ''; ?>" method="POST">
   
    <input type="hidden" name="id" value="<?= isset($offre['_id']) ? $offre['_id'] : ''; ?>">
    
    <label for="name">Nom :</label>
    <input type="text" name="name" class="form-control" value="<?= isset($offre['name']) ? htmlspecialchars($offre['name']) : ''; ?>" required>

    <label for="description">Description :</label>
    <textarea name="description" class="form-control" rows="4" required><?= isset($offre['description']) ? htmlspecialchars($offre['description']) : ''; ?></textarea>

    <label for="tarif">Tarif:</label>
    <input type="text" step="0.01" name="tarif" class="form-control" value="<?= isset($offre['tarif']) ? htmlspecialchars($offre['tarif']) : ''; ?>" required>

    
    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
</form>