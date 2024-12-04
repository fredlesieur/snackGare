<div class="offre-title">
    <h2 class="text-center tittlePages">Nos offres du moment</h2>
</div>
      <!-- Vérifie s'il y a des horaires disponibles -->
<section class="menu-section">
    <?php if (!empty($offres)): ?>
        <div class="menu-items text-center">
            <?php foreach ($offres as $offre): ?>
                <div class="menu-item text-center">
                    <h3><strong><?= htmlspecialchars($offre["name"]); ?></h3></strong>  
                    <h5><?= htmlspecialchars($offre["tarif"]); ?></h5><br>
                    <p> <?= htmlspecialchars($offre["description"]); ?></p>
                </div>
        
            <?php endforeach; ?>
        </div>
      <?php else: ?>
          <p class="text-center">Aucun offre disponible pour le moment.</p>
      <?php endif; ?>
</section>