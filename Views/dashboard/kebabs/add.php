<h2>Ajouter un Kebab</h2>
<form method="post" action="/kebab/save">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"></textarea>

    <label>Prix (Sandwich) :</label>
    <input type="number" step="0.01" name="price_sandwich" class="form-control" required>

    <label>Prix (Menu) :</label>
    <input type="number" step="0.01" name="price_menu" class="form-control" required>

    <label>Prix (Assiette) :</label>
    <input type="number" step="0.01" name="price_plate" class="form-control" required>

    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
</form>
