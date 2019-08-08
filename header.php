<?php session_start();
if (isset($_SESSION['nutzer'])) {
    $id=$_SESSION['nutzer'];
}else {
    $_SESSION['nutzer']='';
    $id='';
}
include 'funktionen.php';
$db_link=startedb();

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/header.css">
</head>
<body>
  <div class="header">
      <img src="bilder/HEADER_LOGO.jpg" width="30px" >
    <h1>Sitan</h1>
  </div>

  <?php
  if (isset($_POST["logout"])) {
      $_SESSION["nutzer"]="";
  }
  ?>
  <div class="topnav">
  <a class="active" href="start.php">Startseite</a>
  <a href="event.php">Veranstaltungen</a>
  <a href='contact.php'>Kontakt</a>
  <a href="impressum.php">Impressum</a>
  <a href="hilfe.php">Hilfe</a>
  <?php if (empty($_SESSION["nutzer"])): ?>
    <a href="register.php">Registrieren</a>
    <a href="login.php">Anmelden</a>
  <?php else: ?>
    <a  href="verwaltung.php">Verwaltung</a>
    <a  href="profil.php">Profil</a>
    <form  method="post">
        <input type="submit"  name="logout" value="Bye">
    </form>
  <?php endif;?>
  </div>


<?php

	if (!empty($_SESSION["nutzer"])) {
    $id=$_SESSION['nutzer'];
    $rang=$db_link->query("SELECT rolle FROM nutzer WHERE nid='$id'");
    $rang2=$rang->fetch_array();
  }

        ?>
<br><br>
