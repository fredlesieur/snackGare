<h2>Modifier un Burger</h2>
<form method="post" action="/burger/save">
    <input type="hidden" name="id" value="<?= htmlspecialchars($burger['id']); ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

    <label>Nom :</label>
    <input type="text" name="name" value="<?= htmlspecialchars($burger['name']); ?>" required>

    <label>Description :</label>
    <textarea name="description"><?= htmlspecialchars($burger['description']); ?></textarea>

    <label>Prix :</label>
    <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($burger['price']); ?>" required>

    <label>Prix Menu :</label>
    <input type="number" step="0.01" name="price_menu" value="<?= htmlspecialchars($burger['price_menu']); ?>" required>

    <button type="submit">Mettre à jour</button>
</form>
