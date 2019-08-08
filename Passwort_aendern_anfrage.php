<?php include 'header.php'; ?>



  <br><br><br><br><br><br>
<center>
  <form action="" method="post">
      <label for="emailf">E-Mail Adresse:</label><br>
      <input type="email" name="emailf"><br><br>
      <input type="submit" name="submit" value="Abschicken">
  </form>

  <?php
    if (isset($_POST["submit"])) {

          $email=$_POST["emailf"];
          $email=sqlxss($email);
          $hash=hash('sha256',$email);
          
          $time_old = time();
          $krypt_time = '728346524x84365387645y'.$time_old.'y28946538767846';

          $db_link->query("UPDATE nutzer SET hash='$hash' WHERE email='$email' LIMIT 1");


          //E-Mail an User

          echo "Dir wurde nun ein E-Mail mit weiterführenden Link zugestellt. ";
          $betreff="Passwort vergessen";
          $nachricht="Klicke auf den Link zum Ändern des Passworts: https://trojato.de/Fundsachenforum/Passwort_aendern.php?hash=".$hash."&time=".$krypt_time;//."&time=".$time;

          mail($_POST["emailf"], $betreff, $nachricht, "From: Büwie-App <app@gymbw.de>"."\n".'Content-Type:text/plain; charset="UTF-8"');
    }
  ?>


<br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>
