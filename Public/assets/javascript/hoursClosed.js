
// Fonction de gestion de l'affichage de "Fermé" en fonction de la case cochée pour le midi
function toggleLunchTimes() {
    const lunchFields = ['opening_time_lunch', 'closing_time_lunch'];
    const isChecked = document.getElementById("is_closed_lunch").checked;

    lunchFields.forEach(field => {
        const element = document.getElementById(field);
        if (isChecked) {
            element.disabled = true;
            element.value = ''; // Réinitialise les valeurs à vide
        } else {
            element.disabled = false;
        }
    });
}

// Fonction de gestion de l'affichage de "Fermé" en fonction de la case cochée pour le soir
function toggleDinnerTimes() {
    const dinnerFields = ['opening_time_dinner', 'closing_time_dinner'];
    const isChecked = document.getElementById("is_closed_dinner").checked;

    dinnerFields.forEach(field => {
        const element = document.getElementById(field);
        if (isChecked) {
            element.disabled = true;
            element.value = ''; // Réinitialise les valeurs à vide
        } else {
            element.disabled = false;
        }
    });
}

// Activer/désactiver les champs en fonction des cases préalablement cochées
document.addEventListener("DOMContentLoaded", function() {
    toggleLunchTimes();
    toggleDinnerTimes();
});
