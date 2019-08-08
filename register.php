<?php include 'header.php'; ?>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/register.css">
    </head>
    <div id='main'>


    <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Registrieren</h3>
			</div>
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input id="email" type="email" name="email" class="form-control" placeholder="Email">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id="password" type="password" name="passwort" class="form-control" placeholder="Passwort">
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id = "password2" type="password" name="passwort2" class="form-control" placeholder="Passwort bestätigen">
					</div>

					<div class="form-group center-block">
						<input type="submit" name="send" value="Registrieren" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
lol
<?php
if (isset($_POST["send"])) {

    //Werte aus in Forumlar in Variable abspeichern
    $email=$_POST["email"];
    $email=sqlxss($email);
    $passwort=$_POST["passwort"];
    $passwort=sqlxss($passwort);
    $passwort2=$_POST['passwort2'];
    $passwort2=sqlxss($passwort2);

    if ($passwort!=$passwort2) {
      echo "Passwörter stimmen nicht überein";
    }else {

    $hash = hash('sha256',$passwort);

    //Überprüfung, ob die E-Mail bereits vorhanden
    $db_email=$db_link->query("SELECT email FROM nutzer WHERE email='$email'");
    $count=$db_email->num_rows;
    if ($count==1) {
        echo "E-Mail ist bereits vergeben.";

    }else {

          //Einspeichern in DB und Weiterleitung zur Startseite
          $db_link->query("INSERT INTO nutzer(email, passwort, rolle ) VALUES ('$email', '$hash', 1)");
          $id=$db_link->query("SELECT nid FROM nutzer WHERE email='$email' AND passwort='$hash'");

          $id2=$id->fetch_array();
          $id=$id2['nid'];
          $_SESSION['nutzer']=$id;


          echo '<meta http-equiv="refresh" content="0; url=start.php">';
    }
    }
}
?>
</div>

<?php include 'footer.php'; ?>
