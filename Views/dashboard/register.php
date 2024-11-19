<h2>Inscription d'un Utilisateur</h2>
<form action="/user/register" method="POST">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
    <select name="role">
        <option value="admin">Admin</option>
        <option value="collaborateur">Collaborateur</option>
    </select>
    <button type="submit">Créer l'utilisateur</button>
</form>
