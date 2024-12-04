<h2>Ajouter une Offre</h2>
<form class="register" method="post" action="/offre/add">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>nom :</label>
    <input type="text" name="name" class="form-control" required>

    <label>Description :</label>
    <textarea id="description" name="description" rows="4" cols="50"required></textarea>

    <label>Tarifs:</label>
    <input type="number" step="0.01" name="tarif" class="form-control">

    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
</form>