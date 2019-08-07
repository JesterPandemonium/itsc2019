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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container" style="height:20%;">
        <a href="index.php">Startseite</a>
        <?php
        if (isset($_POST["logout"])) {
            $_SESSION["nutzer"]="";
        }
        ?>
        <?php if (empty($_SESSION["nutzer"])): ?>
            <a class="btn btn-dark" style="margin-top:2px;" href="anmelden.php">Anmelden</a>
        <?php else: ?>

            <a  href="verwaltung.php">Verwaltung</a>
            <a  href="profil.php">Profil</a>
            <form  method="post">
                    <input type="submit" class="btn btn-dark" name="logout" value="Bye">
            </form>


        <?php endif;
        $id=$_SESSION['nutzer'];
        $rang=$db_link->query("SELECT rolle FROM nutzer WHERE nid='$id'");
        $rang2=$rang->fetch_array();
        ?>
    </div>
