<h1>Liste des images</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Alt Text</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($images as $image): ?>
            <tr>
                <td><?= htmlspecialchars($image['id']) ?></td>
                <td><img src="<?= htmlspecialchars($image['url']) ?>" alt="<?= htmlspecialchars($image['alt_text']) ?>" width="100"></td>
                <td><?= htmlspecialchars($image['alt_text']) ?></td>
                <td>
                    <a href="/image/delete/<?= htmlspecialchars($image['id']) ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette image ?');" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
