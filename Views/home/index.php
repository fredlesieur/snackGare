<h1 class="tittlePages">Accueil</h1>

<main class="home-page">
    <!-- Bannière principale -->
    <div class="hero-banner">
        <div class="text-container">
            <h2 class="main-title">Tous les jours<br><span class="text-center">sauf le samedi</span></h2>
            <h3 class="linkhours"><a href="/contact">Voir nos horaires</a></h3>
          <a href="/menu" class="btn-order">Commander</a>
        </div>
    </div>

    <!-- Parcourir toutes les sections -->
    <?php if (!empty($sections)): ?>
        <?php foreach ($sections as $section): ?>
            <section class="section">
                <div class="text-container">
                    <h2>
                        <?php if ($section['title'] === 'En ce moment'): ?>
                            <a href="/offre"><?= htmlspecialchars($section['title'] ?? 'Titre indisponible'); ?></a>
                        <?php elseif ($section['title'] === 'Nos spécialités'): ?>
                            <a href="/menu"><?= htmlspecialchars($section['title'] ?? 'Titre indisponible'); ?></a>
                        <?php else: ?>
                            <?= htmlspecialchars($section['title'] ?? 'Titre indisponible'); ?>
                        <?php endif; ?>
                    </h2>
                    <p><?= htmlspecialchars($section['content'] ?? 'Contenu indisponible'); ?></p>
                </div>
                <?php if (!empty($section['image_urls'])): ?>
                    <div class="carousel-container">
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
                            </div><br><br>
                            <h3 class="text-center"><a href="/avis/form">Laisser un avis</a></h3>
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
    </section> <br> <br>

</main>