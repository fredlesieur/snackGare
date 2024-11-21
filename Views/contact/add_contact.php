<?php if ($_SESSION['role'] === 'admin') : ?>
    <h1 class="container-fluid banner pt-5 pb-5">Ajouter un contact</h1>
    <section class="container">
        <div class="mx-auto p-4">
            <!-- Formulaire d'ajout de contact -->
            <form action="/contact/addContact" method="post" enctype="multipart/form-data">
                <!-- Image -->
                <label for="image">Image :</label>
                <input type="file" name="image" id="image" required><br>

                <!-- Bouton Ajouter -->
                <button type="submit" class="btn w-100 mt-2">Ajouter</button>

                <!-- CSRF Protection -->
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            </form>

            <!-- Affichage des erreurs (si présentes) -->
            <?php if (!empty($error)) : ?>
                <p class="text-danger mt-3"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
