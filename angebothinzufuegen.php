<?php include 'header.php'; ?>
<head>
  <title> Angebotseinstellung </title>
</head>
<?php //https://getbootstrap.com/docs/4.3/components/forms/ ?>
<form method ="POST">
  Bibliothek:
  <input type="text" ID="Bibliothek" name="Bibliothek">
  <br>
  Ort:
  <input type="text"ID="Ort"name="Ort">

  <br>
  Strasse:
  <input type="text" ID="Straße" name="Straße">

  <br>
  PLZ:
  <input type="number" name="PLZ" name="PLZ">
  <br>

  <label>
    Uhrzeit:
    <input type="time" name="uhrzeit">
  </label>
  <br>

</label>
Datum:
<input type="date" id="dat">

  <br>
  Laengengrad:
  <input type="number" ID="Laengengrad" name="Laengengrad">
  <br>
  Breitengrad:
  <input type="number" Id="Breitengrad" name="Breitengrad">
  <br>
  Titel:
  <input type="text" id="text" name="text">
  <br>
  Beschreibung:
  <textarea name="text" rows="10" cols="20">
  </textarea>
  <br>
  Kategorie:
  <select name="Kategorie">
    <option value="Kinder">Kinder bis 12 Jahre</option>
    <option value="Jugendliche">Jugendliche bis 18 Jahre</option>
    <option value="Erwachsene">Erwachsene bis 60 Jahre</option>
    <option value="Senioren">Senioren ab 60</option>
  </select>
  <br>

  Anzahl der Personen:
  <input type="number" ID="AnzahlderPersonen" name="AnzahlderPersonen">
  <br>

  Vorraussetzungen:
  <textarea name="text" rows="10" cols="20">
  </textarea>
  <br>

  Preis:
  <input type="number" ID="Preis" name="Preis">&euro;
  <br>

  <input type="submit" name="send" value="Angebot hinzufügen">
</form>

<?php

?>
<?php include 'footer.php'; ?>
