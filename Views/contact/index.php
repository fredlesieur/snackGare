<h1 class="tittlePages">Contact</h1><br>


<section>
<h2 class="text-center">Nos Horaires</h2><br><br>

    <div class="hero-banner">
        <?php if (!empty($horairesContact)): ?>
            <?php foreach ($horairesContact as $horaire): ?>
                <div class="horaire">
                    <div class="jour"><?= htmlspecialchars($horaire['jours']) ?></div>
                    <div class="horaires">
                        <?php
                        if ($horaire['is_closed_lunch'] == 1 && $horaire['is_closed_dinner'] == 1) {
                            echo "---";
                        } else {
                            $horaires = [];
                            if ($horaire['is_closed_lunch'] != 1) {
                                $horaires[] = date('H:i', strtotime($horaire['opening_time_lunch'])) . "-" . date('H:i', strtotime($horaire['closing_time_lunch']));
                            }
                            if ($horaire['is_closed_dinner'] != 1) {
                                $horaires[] = date('H:i', strtotime($horaire['opening_time_dinner'])) . "-" . date('H:i', strtotime($horaire['closing_time_dinner']));
                            }
                            echo implode(" et ", $horaires);
                        }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <em>Horaires non disponibles</em>
        <?php endif; ?>
    </div>
</section><br><br>


<section class="contact-map">
    <h2 class="text-center">Nous trouver</h2><br><br>
    <div class="map-container">
        <!-- Intégrez une carte interactive ou une image -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.8477251360737!2d5.2401!3d45.143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478afdbcdf4c!2s95%20Route%20de%20St%20Lattier%2C%2038840%20Saint-Hilaire-du-Rosier!5e0!3m2!1sfr!2sfr!4v0000000000000"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="address">
            <i class="fa fa-map-marker-alt"></i> 95 route de St Lattier <br> 38840 St Hilaire du Rosier
        </div>
    </div>
</section> <br><br>