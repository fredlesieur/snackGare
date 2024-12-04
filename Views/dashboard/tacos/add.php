<h2>Ajouter une Formule de Tacos</h2>
<form class="register" method="post" action="/tacos/save">
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
    <label>Nom :</label>
    <input type="text" name="name" class="form-control" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"></textarea>

    <label>Prix (Solo) :</label>
    <input type="number" step="0.01" name="price_solo" class="form-control" required>

    <label>Prix (Menu) :</label>
    <input type="number" step="0.01" name="price_menu" class="form-control" required>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>


