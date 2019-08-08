<?php include 'header.php'; ?>
<head>

    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
    <div id="main">
    <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Anmelden</h3>
			</div>
			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="Email">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="passwort" class="form-control" placeholder="Passwort">
					</div>
					<div class="form-group center-block">
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="Passwort_aendern_anfrage.php">Passwort vergessen?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST["submit"])) {

    //Werte aus in Forumlar in Variable abspeichern
    $email=$_POST["email"];
    $email=sqlxss($email);
    //Umwandlung in Hash
    $passwort=$_POST["passwort"];
    $hash=hash('sha256',$passwort);

    //Abfrage des Passworts in der DB
    $db_id=$db_link->query("SELECT nid,passwort FROM nutzer WHERE email='$email'");
    $db_hash=$db_id->fetch_array();


    //Vergleich von Hashwerten
    if ($hash==$db_hash["passwort"]) {
      //Ob E-Mail vorhanden
      $count=$db_id->num_rows;
      if ($count==1) {
        //Auslesen der NutzerID, Speichern in SESSION Varible und Weiterleitung
        $id=$db_link->query("SELECT nid FROM nutzer WHERE email='$email' AND passwort='$hash'");
        $id2=$id->fetch_array();
        $_SESSION['nutzer']=$id2['nid'];
        echo '<meta http-equiv="refresh" content="0; url=start.php">';
      }else {
        echo "<center>E-Mail oder Passwort nicht korrekt!</center>";
      }
    }else {
      echo "<center>E-Mail oder Passwort nicht korrekt!</center>";
    }
}
?>
    </div>
<?php include 'footer.php'; ?>
