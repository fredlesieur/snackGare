<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<form class="register" action="/user/register" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

    <label for="username">Nom d'utilisateur:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" id="password" required>

    <label for="role">Rôle:</label>
    <select name="role" id="role" required>
        <option value="admin">Admin</option>
        <option value="collaborateur">Collaborateur</option>
    </select>

    <button type="submit">Créer</button>
</form>

