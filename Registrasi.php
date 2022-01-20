<?php require ('Action.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Pelanggan</title>
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
		<h1>Registrasi</h1>
		<input type="text" name="name" required="" placeholder="Nama Lengkap">
		<input type="email" name="mail" required="" placeholder="Email">
		<textarea name="alamat" required="" placeholder="Alamat"></textarea>
		<input type="text" name="pos" required="" placeholder="Kode Pos">
		<input type="password" name="pass" required="" placeholder="Password">
		<input type="password" name="repass" required="" placeholder="Konfirmasi Password">
		<input type="submit" name="create" value="Daftar"></td>
	</form>
</body>
</html>