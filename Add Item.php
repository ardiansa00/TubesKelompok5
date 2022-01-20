<?php require ('Admin Action.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
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
		<a href="Admin Login.php" class="button">logout</a>
	</header>

	<form action="Admin Action.php" method="post" class="form" enctype="multipart/form-data">
		<h1>Tambah barang</h1>
		<input type="text" name="nama" placeholder="Nama Barang">
		<input type="file" name="gambar">
		<input type="text" name="harga" placeholder="Harga Barang">
		<input type="text" name="stok" placeholder="Stok Barang">
		<input type="submit" name="tambah" value="Tambah">
	</form>
</body>
</html>