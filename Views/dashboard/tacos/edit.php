<h2>Modifier une Formule de Tacos</h2>
<form method="post" action="/tacos/save">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">   
    <input type="hidden" name="id" value="<?= htmlspecialchars($taco['id']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($taco['name']); ?>" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($taco['description']); ?></textarea>

    <label>Prix (Solo) :</label>
    <input type="number" step="0.01" name="price_solo" class="form-control" value="<?= htmlspecialchars($taco['price_solo']); ?>" required>

    <label>Prix (Menu) :</label>
    <input type="number" step="0.01" name="price_menu" class="form-control" value="<?= htmlspecialchars($taco['price_menu']); ?>" required>

    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>

