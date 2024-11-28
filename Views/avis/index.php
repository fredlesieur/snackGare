<section class="avis-section">
    <h2>Avis de nos clients</h2>
    <div id="avisCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php if (!empty($avis)): ?>
                <?php foreach ($avis as $index => $review): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="card text-center mx-auto" style="max-width: 600px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($review['nom']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($review['commentaire']) ?></p>
                                <div class="stars">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($i <= $review['rating']): ?>
                                            <i class="fas fa-star text-warning"></i> <!-- Star pleine -->
                                        <?php else: ?>
                                            <i class="far fa-star text-warning"></i> <!-- Star vide -->
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <p class="card-footer text-muted">
                                    Posté le <?= date('d-m-Y', strtotime($review['dateavis'])) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center">
                    <p>Aucun avis validé pour le moment.</p>
                </div>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#avisCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#avisCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>

