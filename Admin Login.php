<?php require ('Admin Action.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="Style2.css">
</head>
<body>
	<header>
		<a href="Home.html" class="logo">admin</a>
		<nav>
			<ul class="navbar">
				<li><a href="Item List.php">daftar barang</a></li>
				<li><a href="User List.php">daftar user</a></li>
			</ul>
		</nav>
		<a href="Admin Login.php" class="button">login</a>
	</header>

	<form action="Admin Action.php" method="post" class="form">
		<h1>login</h1>
		<input type="text" name="admin" placeholder="Nama">
		<input type="password" name="pass" placeholder="Password">
		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>