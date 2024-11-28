<?php if (isset($css)) echo '<link rel="stylesheet" href="' . htmlspecialchars($css) . '">'; ?>
<main class="home-page">
    <!-- Bannière principale -->
    <div class="hero-banner">
        <div class="text-container">
            <h1 class="main-title">Tous les jours<br><span>sauf le samedi</span></h1>
            <h2 class="linkhours">Voir nos horaires</h2> <!-- Lien vers la page contact -->
            <a href="#" class="btn-order">Commander</a>
        </div>
    </div>

    <!-- Parcourir toutes les sections -->
    <?php if (!empty($sections)): ?>
        <?php foreach ($sections as $section): ?>
            <section class="section">
                <h2><?= htmlspecialchars($section['title'] ?? 'Titre indisponible'); ?></h2>
                <p><?= htmlspecialchars($section['content'] ?? 'Contenu indisponible'); ?></p>

                <!-- Carousel Bootstrap -->
                <?php if (!empty($section['image_urls'])): ?>
                    <div id="carouselSection<?= htmlspecialchars($section['id']); ?>" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php 
                            $imageUrls = explode(',', $section['image_urls']);
                            $imageAltTexts = explode(',', $section['image_alt_texts']);
                            foreach ($imageUrls as $index => $url): ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                    <img src="<?= htmlspecialchars($url); ?>" 
                                         class="d-block w-100" 
                                         alt="<?= htmlspecialchars($imageAltTexts[$index] ?? 'Image'); ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselSection<?= htmlspecialchars($section['id']); ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselSection<?= htmlspecialchars($section['id']); ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    </div>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune section disponible pour l'instant.</p>
    <?php endif; ?>

    <!-- Section Vos Avis -->
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

</main>





