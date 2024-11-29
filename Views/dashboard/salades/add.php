<h2>Ajouter une Salade</h2>
<form method="post" action="/salade/save">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"></textarea>

    <label>Prix :</label>
    <input type="number" step="0.01" name="price" class="form-control" required>

    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
</form>
