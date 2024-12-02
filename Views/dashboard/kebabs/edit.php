<h2>Modifier un Kebab</h2>
<form method="post" action="/kebab/save">
    <input type="hidden" name="id" value="<?= htmlspecialchars($kebab['id']); ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($kebab['name']); ?>" required>

    <label>Description :</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($kebab['description']); ?></textarea>

    <label>Prix (Sandwich) :</label>
    <input type="number" step="0.01" name="price_sandwich" class="form-control" value="<?= htmlspecialchars($kebab['price_sandwich']); ?>" required>

    <label>Prix (Menu) :</label>
    <input type="number" step="0.01" name="price_menu" class="form-control" value="<?= htmlspecialchars($kebab['price_menu']); ?>" required>

    <label>Prix (Assiette) :</label>
    <input type="number" step="0.01" name="price_plate" class="form-control" value="<?= htmlspecialchars($kebab['price_plate']); ?>" required>
    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>
