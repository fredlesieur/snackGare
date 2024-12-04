<h1 class="tittlePages">Notre Menu</h1> <br><br>

<div class="menu-container">

    <div class="menu-title container"> 
        <h2 class="titreh2">Nos Burgers</h2>
        <img src="https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725198/images/cbvh9unha90nrxtnlqmk.webp" alt="burger" class="size-img">     
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

    <!-- Section Tacos -->
    <div class="menu-title container"> 
        <h2 class="titreh2">Nos Tacos</h2>
        <img src="https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725402/images/sbxrimuxnrku2af7nmyy.webp" alt="burger" class="size-img">     
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
                    <h4>
                        <?= htmlspecialchars($option['category']); ?>
                        <?php if ($option['category'] === 'Nos sauces'): ?>
                            <!-- Ajout des icônes de piment uniquement si la catégorie est "Nos sauces" -->
                            *<i class="fas fa-pepper-hot"></i>&nbsp; **<i class="fas fa-pepper-hot"></i><i class="fas fa-pepper-hot"></i>
                        <?php endif; ?>
                        <?= !empty($option['price']) ? number_format($option['price'], 2) . ' €' : ''; ?>
                    </h4>
                    <p><?= htmlspecialchars($option['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>


        <p class="border_deco text-center">Le menu comprend frites et boissons au choix </p>
    </section>

    <!-- Section kebabs -->
    <div class="menu-title container"> 
        <h2 class="titreh2">Nos Kebabs</h2>
        <img src="https://res.cloudinary.com/dkpfhgnyx/image/upload/v1732725363/images/fnig9rapeaddoqf4q3cq.webp" alt="burger" class="size-img">     
    </div>
    <section class="menu-section kebabs">
        <div class="menu-items border_deco">
            <div class="menu-item text-center">
                <?php if (!empty($kebabs)) : ?>

                    <?php foreach ($kebabs as $kebab) : ?>

                        <h4>Kebabs : <?= htmlspecialchars($kebab['price_sandwich']); ?> €<br>
                            Menu Kebabs <?= htmlspecialchars($kebab['price_menu']); ?> €<br>
                            Assiette Kebabs: <?= htmlspecialchars($kebab['price_plate']); ?> € <br> <br>
                            <span class="bleuc"><?= htmlspecialchars($kebab['description']); ?></span>
                        </h4>

                    <?php endforeach; ?>
            </div>

        </div>
    <?php else : ?>
        <p>Aucun kebab disponible pour le moment.</p>
    <?php endif; ?>

    <div class="text-center">
        <?php if ($kebabOption): ?>
            <div class="options">
                <h4><?= htmlspecialchars($kebabOption['category']); ?> *<i class="fas fa-pepper-hot"></i>&nbsp; **<i class="fas fa-pepper-hot"></i><i class="fas fa-pepper-hot"></i></h4>
                <p><?= htmlspecialchars($kebabOption['description']); ?></p>
            </div>
        <?php endif; ?>
    </div>
    <p class="border_deco text-center">Le menu comprend frites et boissons au choix</p>
    </section>


    <!-- Section salades -->

    <div class="menu-title container"> 
        <h2 class="titreh2">Nos Salades</h2>
        <img src="https://res.cloudinary.com/dkpfhgnyx/image/upload/v1733331510/images/rgsftmrtqidphssozf7d.webp" alt="burger" class="size-img">     
    </div>
    <section class="menu-section salades">
        <div class="menu-items">
            <?php foreach ($salades as $salade): ?>
                <div class="menu-item">
                    <h4><?= htmlspecialchars($salade['name']); ?> <?= !empty($salade['price']) ? number_format($salade['price'], 2) . ' €' : ''; ?>
                    </h4>
                    <p><?= htmlspecialchars($salade['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Section snacks -->
    <div class="menu-title container"> 
        <h2 class="titreh2">Notre Snacks</h2>
        <img src="https://res.cloudinary.com/dkpfhgnyx/image/upload/v1733332399/snack_z682s0.jpg" alt="burger" class="size-img">     
    </div>
    <section class="menu-section snacks">
        <div class="menu-items">
            <?php foreach ($snacks as $snack): ?>
                <div class="menu-item">
                    <h4><?= htmlspecialchars($snack['name']); ?> <?= !empty($snack['price']) ? number_format($snack['price'], 2) . ' €' : ''; ?></h4>
                    <p><?= htmlspecialchars($snack['description']); ?></p>
                    <p></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- Section Boissons -->
    <div class="menu-title container"> 
        <h2 class="titreh2">Boissons</h2>
        <img src="https://res.cloudinary.com/dkpfhgnyx/image/upload/v1733334976/boissons_t4grfp.jpg" alt="bouteille et verre" class="size-img">     
    </div>
    <section class="menu-section boissons">
        <div class="menu-items">
            <?php foreach ($boissons as $boisson): ?>
                <div class="boisson">
                    <h4> <?= htmlspecialchars($boisson['name']); ?> </h4>
                    <p class="boisson"><?= htmlspecialchars($boisson['description']); ?></p>
                    <p class="prix"><?= !empty($boisson['price_bottle']) ? 'Bouteille : ' . number_format($boisson['price_bottle'], 2) . ' €' : ''; ?></p>
                    <p class="prix"><?= !empty($boisson['price_can']) ? 'Canette : ' . number_format($boisson['price_can'], 2) . ' €' : ''; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
</div>