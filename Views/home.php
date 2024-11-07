<h1><?= htmlspecialchars($page['title']) ?></h1>

<!-- Affichage des sections -->
<?php foreach ($sections as $section): ?>
    <div class="section">
        <h2><?= htmlspecialchars($section['title']) ?></h2>
        <?php if (!empty($section['image_url'])): ?>
            <img src="<?= htmlspecialchars($section['image_url']) ?>" alt="Image de <?= htmlspecialchars($section['title']) ?>">
        <?php endif; ?>
        <p><?= htmlspecialchars($section['content']) ?></p>
    </div>
<?php endforeach; ?>

<!-- Affichage des avis -->
<h2>Vos Avis</h2>
<?php foreach ($avis as $a): ?>
    <div class="avis">
        <p><strong><?= htmlspecialchars($a['nom']) ?></strong> le <?= date('d/m/Y', strtotime($a['dateavis'])) ?></p>
        <p><?= htmlspecialchars($a['commentaire']) ?></p>
    </div>
<?php endforeach; ?>

<!-- Affichage des horaires -->
<h2>Horaires</h2>
<?php foreach ($horaires as $horaire): ?>
    <p><?= htmlspecialchars($horaire['jours']) ?> : de <?= htmlspecialchars($horaire['opening_time']) ?> à <?= htmlspecialchars($horaire['closing_time']) ?></p>
<?php endforeach; ?>
