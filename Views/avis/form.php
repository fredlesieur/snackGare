
<h1 class="tittlePages">Vos Avis</h1> <br><br>

<section class="form-container">
    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['success']) ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>


    <h2>Votre avis nous intéresse</h2>

    <form action="/avis/add" method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">

        <!-- Section étoiles interactives -->
        <div class="rating">
            <input type="radio" name="rating" id="star1" value="1" required>
            <label for="star1" title="1 étoile">&#9733;</label>

            <input type="radio" name="rating" id="star2" value="2">
            <label for="star2" title="2 étoiles">&#9733;</label>

            <input type="radio" name="rating" id="star3" value="3">
            <label for="star3" title="3 étoiles">&#9733;</label>

            <input type="radio" name="rating" id="star4" value="4">
            <label for="star4" title="4 étoiles">&#9733;</label>

            <input type="radio" name="rating" id="star5" value="5">
            <label for="star5" title="5 étoiles">&#9733;</label>
        </div>


        <div class="mb-3">
            <label for="nom" class="form-label">Pseudo</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="commentaire" class="form-label">Votre commentaire</label>
            <textarea name="commentaire" id="commentaire" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</section> <br> <br>

 <!-- Section Vos Avis -->
 <section class="avis-section">
    <h2 class="text-center">Les Avis de nos clients</h2> <br><br>
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
</section> <br> <br>