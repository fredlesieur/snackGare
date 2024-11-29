<h1 class="tittlePages">Notre Menu</h1> <br><br>

<div class="menu-container">

    <div class="menu-title">
        <h2 class="text-center">Nos Burgers</h2>
    </div>
    <!-- Section Burgers -->
    <section class="menu-section burgers">
        <div class="menu-items">
            <?php foreach ($burgers as $burger): ?>
                <div class="menu-item">
                    <h3><?= htmlspecialchars($burger['name']); ?></h3>
                    <p><?= htmlspecialchars($burger['description']); ?></p>
                    <p class="bleum">Solo <?= number_format($burger['price'], 2); ?> € | Menu <?= number_format($burger['price_menu'], 2); ?> €</p>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="border_deco text-center">Le menu comprend frites et boissons au choix.</p>
    </section>
</div>
<!-- Section Tacos -->
<div class="menu-title">
        <h2>Nos Tacos</h2>
    </div>
<section class="menu-section tacos">
    
    <div class="menu-items border_deco">
        <div class="menu-item text-center">
            <?php foreach ($tacos as $taco): ?>
                <h4><?= htmlspecialchars($taco['name']); ?></h4>
                <p class="bleum">Solo <?= number_format($taco['price_solo'], 2); ?> € | Menu <?= number_format($taco['price_menu'], 2); ?> €</p>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Section des options -->
    <div class="text-center">
        <?php foreach ($options as $option): ?>
            <div class="options">
                <h4><?= htmlspecialchars($option['category']); ?> <?= !empty($option['price']) ? number_format($option['price'], 2) . ' €' : ''; ?></p>
                </h4>
                <p><?= htmlspecialchars($option['description']); ?>
            </div>
        <?php endforeach; ?>
    </div>


    <p class="border_deco text-center">Le menu comprend frites et boissons au choix</p>
</section>

<!-- Section kebabs -->
<div class="menu-title">
        <h2>Nos Kebabs</h2>
    </div>
<section class="menu-section tacos">
    
<div class="menu-items border_deco">
    <div class="menu-item text-center">
        <?php foreach ($kebabs as $kebab): ?>
            <h4><?= htmlspecialchars($kebab['name']); ?></h4>
            <p>Prix sandwich : <?= number_format($kebab['price_sandwich'], 2); ?> €</p>
            <p>Prix menu : <?= number_format($kebab['price_menu'], 2); ?> €</p>
            <p>Prix assiette : <?= number_format($kebab['price_plate'], 2); ?> €</p>
            <h5>Description : <?= htmlspecialchars($kebab['description']); ?></h5>
        <?php endforeach; ?>
    </div>
</div>

<!-- Affichage des options -->
<div class="options sauces">
    <h4>Catégorie : Sauces</h4>
    <?php foreach ($sauces as $sauce): ?>
        <p><?= htmlspecialchars($sauce['description']); ?> - <?= number_format($sauce['price'], 2); ?> €</p>
    <?php endforeach; ?>
</div>
    <p class="border_deco text-center">Le menu comprend frites et boissons au choix</p>
</section>



<!-- Section salades -->
<section>
    <div class="menu-title">
        <h2>Salades</h2>
    </div>
    <div class="menu-items">
        <div class="menu-item">
            <h3>Salade César</h3>
            <p>Salade, poulet, tomates, croûtons, parmesan, sauce césar.</p>
            <p class="bleum">Prix
</section>

<!-- Section snacks -->
<section>
    <div class="menu-title">
        <h2>Snacks</h2>
    </div>
    <div class="menu-items">
        <div class="menu-item">
            <h3>Nuggets</h3>
            <p>6 pièces de nuggets de poulet.</p>
            <p class="bleum">Prix
</section>

<!-- Section Boissons -->
<section class="menu-section boissons">
    <div class="menu-title">
        <h2>Boissons</h2>
    </div>
    <div class="menu-items">
        <div class="menu-item">
            <p>Coca-Cola (Canette)</p>
            <p class="bleum">Prix : 2.00 €</p>
        </div>
        <div class="menu-item">
            <p>Pepsi (Bouteille)</p>
            <p class="bleum">Prix : 3.50 €</p>
        </div>
    </div>
</section>
</div>