
<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['flash_success']; ?>
        <?php unset($_SESSION['flash_success']); // Efface le message après affichage ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['flash_error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['flash_error']; ?>
        <?php unset($_SESSION['flash_error']); // Efface le message après affichage ?>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Créer un nouvel utilisateur</h2>
    <form action="/user/register" method="POST" class="p-4 shadow rounded" ">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
        
        <!-- Nom d'utilisateur -->
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Entrez un nom d'utilisateur" required>
        </div>

        <!-- Mot de passe -->
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe" required>
        </div>

        <!-- Rôle -->
        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-select" id="role" name="role" required>
                <option value="" disabled selected>Choisissez un rôle</option>
                <option value="admin">Admin</option>
                <option value="collaborateur">Collaborateur</option>
            </select>
        </div>

        <!-- Bouton Soumettre -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
        </div>
    </form>
</div>
