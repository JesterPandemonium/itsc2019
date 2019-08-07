<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Anmelden</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles/changepwd.css">
</head>
<body>
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
						<input type="number" name="id" placeholder="ID" class="form-control" required>
						
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
						<input id = "pw2" type="password" class="form-control" placeholder="Passwort wiederholen">
					</div>
					
					<div class="form-group center-block">
						<input type="submit" value="Bestätigen" name="submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php
  if (isset($_POST["submit"])) {

    $npw=$_POST["pw1"];     //neues Passwort
    $id=$_POST['id'];       //Id eingabe
    $time_old=$_SESSION['timeold'];

if ($id!=$_SESSION['randid']) {
    echo "Unzulässige Id";
}else {
    if (strlen($npw)>=6) {


          if ($_POST["pw1"]==$_POST["pw2"]) {//Überprüfung ob beide Passwörter gleich

                  $npw=hash('sha256',$npw);
                  $email=$_SESSION['email'];
                  $db_link->query("UPDATE nutzer SET passwort='$npw' WHERE email='$email' LIMIT 1");//Datenbank neues Passwort zuweisen
                  echo '<meta http-equiv="refresh" content="0; url=index.php">';
                  $_SESSION['email']='';
                  $_SESSION['timeold']='';
                  $_SESSION['randid']='';
          }else {
            echo "Passwörter stimmen nicht überein!";
          }

    }else {
          echo "mindestens 6 Zeichen";
    }
}

  }

?>


<br><br><br><br><br><br><br><br><br><br><br>
</section>
<?php include 'footer.php'; ?>
