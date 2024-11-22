<form action="/dashboard/addHoraire" method="post">
<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <label for="jours">Jours :</label>
    <input type="text" id="jours" name="jours" required>

    <label for="opening_time_lunch">Heure d'ouverture (Midi) :</label>
    <input type="time" id="opening_time_lunch" name="opening_time_lunch">

    <label for="closing_time_lunch">Heure de fermeture (Midi) :</label>
    <input type="time" id="closing_time_lunch" name="closing_time_lunch">

    <label for="opening_time_dinner">Heure d'ouverture (Soir) :</label>
    <input type="time" id="opening_time_dinner" name="opening_time_dinner">

    <label for="closing_time_dinner">Heure de fermeture (Soir) :</label>
    <input type="time" id="closing_time_dinner" name="closing_time_dinner">

    <label for="is_closed">Fermé :</label>
    <input type="checkbox" id="is_closed" name="is_closed" value="1">

    <button type="submit">Ajouter</button>
</form>

