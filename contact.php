<html>
<head>
</head>

<body>
<form method="POST" > 
	<p>
	<label for="Name"><b>Name:</b></label><br>
	<input type="text" id="Name" name="Name"><br>
	</p>
	<p>
	<label for="Email"><b>E-Mail:</b></label><br>
	<input type="text" id="Email" name="Email"><br>
	</p>	
	<p>
	<label for="Telefonnummer"><b>Telefonnummer</b></label><br>
	<input type="tel" id="Betreff" name="Telefonnummer"><br>
	</p> 	
	<p>
	<label for="Betreff"><b>Titel/Betreff:</b></label><br>
	<input type="text" id="Betreff" name="Betreff"><br>
	</p> 	
	<p>
	<label for="Nachricht"><b>Nachricht:</b></label><br>
	<textarea id="Nachricht" name="Nachricht" rows="12" cols="60"></textarea> <br>
	</p>
	
 
	<input type="submit" name="submit">
</form>

<?php

function sendData(){
	$link = mysqli_connect("127.0.0.1","root","","kontakt");
	mysqli_set_charset($link,"utf8");
	$Name = $_POST["Name"];
	$Email = $_POST["Email"];
	$Telefonnummer = $_POST["Telefonnummer"];
	$Betreff = $_POST["Betreff"];
	$Nachricht = $_POST["Nachricht"];

	$sql="INSERT INTO contactform (Name, Email,Telefonnummer,Titel_Betreff,Nachrichten)
	VALUES ('".$Name."', '".$Email."','".$Telefonnummer."','".$Betreff."','".$Nachricht."')";
	mysqli_query ($link,$sql);
}

if (isset($_POST['submit'])){
	sendData();
}


?>

</body>
</html>

