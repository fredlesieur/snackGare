<h2>Ajouter une Boisson</h2>
<form class="register" method="post" action="/boisson/save">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"></textarea>

    <label>Prix (Bouteille) :</label>
    <input type="number" step="0.01" name="price_bottle" class="form-control">

    <label>Prix (Canette) :</label>
    <input type="number" step="0.01" name="price_can" class="form-control">

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
