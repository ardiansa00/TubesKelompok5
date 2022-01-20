<?php require ('Action.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pembaruan Password</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body style="background-image: url('Regis.jpeg');">

	<form method="post" class="form" action="Action.php">
		<h1>Pembaruan Password</h1>
		<input type="email" name="mail" required="" placeholder="Email">
		<input type="password" name="pass" required="" placeholder="Password">
		<input type="password" name="repass" required="" placeholder="Konfirmasi Password">
		<input type="submit" name="update" value="Update">
	</form>
</body>
</html>