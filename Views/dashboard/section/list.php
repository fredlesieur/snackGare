<div class="section-list">
    <h2 class="text-center mb-4">Liste des Sections</h2>

    <?php if (isset($_SESSION['flash_success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['flash_success']; ?>
            <?php unset($_SESSION['flash_success']); // Supprimer après affichage 
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['flash_error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['flash_error']; ?>
            <?php unset($_SESSION['flash_error']); // Supprimer après affichage 
            ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($sections)): ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sections as $section): ?>
                    <tr>
                        <td><?= htmlspecialchars($section['id']); ?></td>
                        <td><?= htmlspecialchars($section['title']); ?></td>
                        <td><?= htmlspecialchars(substr($section['content'], 0, 100)); ?>...</td>
                        <td>
                            <?php if (!empty($section['image_url'])): ?>
                                <img src="<?= htmlspecialchars($section['image_url']); ?>" alt="<?= htmlspecialchars($section['title']); ?>" class="img-thumbnail" style="width: 100px; height: auto;">
                            <?php else: ?>
                                Pas d'image
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="/section/edit/<?= htmlspecialchars($section['id']); ?>" class="btn btn-primary btn-sm">Modifier</a>
                            <a href="/section/delete/<?= htmlspecialchars($section['id']); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette section ?');">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Aucune section trouvée.</div>
    <?php endif; ?>

</div>