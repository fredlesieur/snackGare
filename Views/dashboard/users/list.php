<div class="user-list">
    <h2 class="text-center mb-4">Liste des utilisateurs</h2>
    <?php if (isset($_SESSION['flash_success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['flash_success']; ?>
            <?php unset($_SESSION['flash_success']); // Supprimer après affichage ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['flash_error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['flash_error']; ?>
            <?php unset($_SESSION['flash_error']); // Supprimer après affichage ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($users)): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['username']); ?></td>
                        <td><?= htmlspecialchars($user['role']); ?></td>
                        <td>
                            <a href="/user/edit/<?= htmlspecialchars($user['id']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="/user/delete/<?= htmlspecialchars($user['id']); ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                               Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Aucun utilisateur trouvé.</div>
    <?php endif; ?>
</div>
