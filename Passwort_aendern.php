<?php
    include 'header.php';
?>
<head>
	<link rel="stylesheet" type="text/css" href="styles/changepwd.css">
</head>
<div id='main'>


<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Passwort zurücksetzen</h3>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" name="email" placeholder="E-Mail" class="form-control" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="pw1" placeholder="Neues Passwort" class="form-control" required>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id = "pw2" type="password" name="pw2" class="form-control" placeholder="Passwort wiederholen">
					</div>

					<div class="form-group center-block">
						<input type="submit" value="Bestätigen" name="submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>


<?php
  if (isset($_POST["submit"])) {

    $email=$_POST["email"];  //E-Mail
    $npw=$_POST["pw1"];     //neues Passwort
    $hash=$_GET["hash"];    //hash url
    $time_krpyt=$_GET["time"];   //time url
    $time_krpyt_split = explode('y', $time_krpyt);
    $time_old = intval($time_krpyt_split[1]);

    $hashdb=$db_link->query("SELECT hash FROM nutzer WHERE email='$email'"); //hash Datenbank
    $hashdb=$hashdb->fetch_array();

    $hashend = $hashdb['hash'];




      if (strlen($npw)>=6) {


            if ($_POST["pw1"]==$_POST["pw2"]) {//Überprüfung ob beide Passwörter gleich

                if ($hash==$hashend) {//ob hashes gleich sind
                    $npw=hash('sha256',$npw);
                    $update=$db_link->query("UPDATE nutzer SET passwort='$npw' WHERE email='$email' LIMIT 1");//Datenbank neues Passwort zuweisen
                    echo '<meta http-equiv="refresh" content="0; url=index.php">';
                }else {
                  echo "Nicht schummeln:D";
                }


            }else {
              echo "Passwörter stimmen nicht überein!";
            }

      }else {
            echo "mindestens 6 Zeichen";
      }
  }

?>


<br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>
