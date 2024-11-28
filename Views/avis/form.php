
<h1 class="tittlePages">Vos Avis</h1>

<div class="form-container">
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
</div>