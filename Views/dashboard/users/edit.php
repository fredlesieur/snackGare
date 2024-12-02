<div class="user-edit">
    <h2>Modifier l'utilisateur</h2>
    <form method="POST" action="/user/update/<?= htmlspecialchars($user['id']); ?>">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
        
        <!-- Nom d'utilisateur -->
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']); ?>" required>
        </div>
        
        <!-- Rôle -->
        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="collaborateur" <?= $user['role'] === 'collaborateur' ? 'selected' : ''; ?>>Collaborateur</option>
            </select>
        </div>
        
        <!-- Bouton Soumettre -->
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
