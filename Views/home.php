<h1><?= isset($page['title']) ? htmlspecialchars($page['title']) : 'Page non trouvée' ?></h1>


<!-- Affichage des sections -->
<?php if (isset($sections) && !empty($sections)): ?>
    <?php foreach ($sections as $section): ?>
        <div class="section">
            <h2><?= htmlspecialchars($section['title']) ?></h2>
            <?php if (!empty($section['image_url'])): ?>
                <img src="<?= htmlspecialchars($section['image_url']) ?>" alt="Image de <?= htmlspecialchars($section['title']) ?>">      
            <?php endif; ?>
            <p><?= htmlspecialchars($section['content']) ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucune section à afficher.</p>
<?php endif; ?>

<!-- Affichage des avis -->
<h2>Vos Avis</h2>
<?php if (isset($avis) && !empty($avis)): ?>
    <?php foreach ($avis as $item): ?>
        <div class="avis">
            <p><strong><?= htmlspecialchars($item['nom']) ?></strong> 
                <?php if (isset($item['dateavis']) && $item['dateavis'] !== null): ?>
                    le <?= date('d/m/Y', strtotime($item['dateavis'])) ?>
                <?php else: ?>
                    <em>Date non spécifiée</em>
                <?php endif; ?>
            </p>
            <p><?= htmlspecialchars($item['commentaire']) ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun avis à afficher.</p>
<?php endif; ?>

<!-- Affichage des horaires -->
<h2>Horaires</h2>
<?php if (isset($horaires) && !empty($horaires)): ?>
    <?php foreach ($horaires as $horaire): ?>
        <p><?= htmlspecialchars($horaire['jours']) ?> : de <?= htmlspecialchars($horaire['opening_time']) ?> à <?= htmlspecialchars($horaire['closing_time']) ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun horaire à afficher.</p>
<?php endif; ?>

