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
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input id="email" type="email" class="form-control" placeholder="Email">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id="password" type="password" class="form-control" placeholder="Passwort">
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id = "password2" type="password" class="form-control" placeholder="Passwort bestätigen">
					</div>

					<div class="form-group center-block">
						<input type="submit" value="Registrieren" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php include 'footer.php'; ?>
