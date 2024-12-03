<div class="container">
      <h2 class="text-center">Nos offres du moment</h2><br>

      <!-- Vérifie s'il y a des horaires disponibles -->
      <?php if (!empty($offres)): ?>
        <div class="row">
            <?php foreach ($offres as $offre): ?>
                <!-- Chaque horaire est dans une colonne avec un cadre autour -->
                <div class="col-12 col-md-6 mb-4">
                    <div class="p-4 border rounded shadow-sm text-center hours homewhite"> 
                        <h3><u><?= htmlspecialchars($offre["name"]); ?></u></h3><br>
                        <p><i>Description : </i> <em><?= htmlspecialchars($offre["description"]); ?></em></p>
                        <p><strong>Tarif :</strong> <strong><?= htmlspecialchars($offre["tarif"]); ?></strong></p><br>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
      <?php else: ?>
          <p class="text-center">Aucun offre disponible pour le moment.</p>
      <?php endif; ?>
  </div>