<?php require ('Action.php'); 
	session_start();
	if (empty($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>	

	<header>
		<ul style="margin-left: 97%;">
			<li class="dropdown"><a href="#"><img src="Image/user.png" height="32px"></a>
				<ul class="isi-dropdown">
					<li><a href="Registrasi.php">Registrasi</a></li>
					<li><a href="Login.php">Login</a></li>
					<li><a href="Logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>

	<form method="post" class="form" action="Action.php">
		<h1>Login</h1>
		<input type="email" name="mail" required="" placeholder="email">
		<input type="password" name="pass" required="" placeholder="password">
		<input type="submit" name="login" value="Login">
		<a href="Forgot Password.php">Lupa Password ?</a></td>
	</form>
</body>
</html>
<?php
}else{
	echo "<script> location='Store.php'; </script>";
}
?>