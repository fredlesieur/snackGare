<?php if ($_SESSION['role'] === 'administrateur') : ?>
    <h1 class="container-fluid banner pt-5 pb-5">Ajouter un animal</h1>
    <section class="container">
        <div class="mx-auto p-4">
            <form action="/contact/createContact" method="post" enctype="multipart/form-data">
                <label for="image">Image :</label>
                <input type="file" name="image" id="image"><br>
                <button type="submit" class="btn success w-100 mt-2">Ajouter</button>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            </form>
        </div>
    </section>
<?php endif; ?>