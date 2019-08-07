<?php include 'header.php'; ?>


  <br><br><br><br><br><br>
<center>
  <form action="" method="post">
      <label for="emailf">E-Mail Adresse:</label><br>
      <input type="email" name="email"><br><br>
      <input type="submit" name="submit" value="Abschicken">
  </form>

  <?php
    if (isset($_POST["submit"])) {

          $email=$_POST["email"];
          $_SESSION['email']=$email;
          $randomid=rand();
          $_SESSION['randid']=$randomid;
          $time_old = time();
          $_SESSION['timeold']=$time_old;


          //E-Mail an User

          echo "Dir wurde nun ein E-Mail mit der Zurücksetzungsid geschickt. ";
          $betreff="Passwort vergessen";
          $nachricht="Die Id zur Änderung deines Passwortes lautet:".$randomid;

          mail($email, $betreff, $nachricht, "From: Büwie-App <app@gymbw.de>"."\n".'Content-Type:text/plain; charset="UTF-8"');
          echo '<meta http-equiv="refresh" content="2; url=Passwort_aendern.php">';
    }
  ?>

<?php include 'footer.php'; ?>
