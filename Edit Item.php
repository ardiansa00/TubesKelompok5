<?php require ('Admin Action.php');
	$item = $action->ItemDetail($_GET['IDItem']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
	<link rel="stylesheet" type="text/css" href="Style2.css">
</head>
<body>

	<header>
		<a href="#" class="logo">admin</a>
		<nav>
			<ul class="navbar">
				<li><a href="Item List.php">daftar barang</a></li>
				<li><a href="User List.php">daftar user</a></li>
			</ul>
		</nav>
		<a href="Admin Login.php" class="button">logout</a>
	</header>
<div>
	<form action="Admin Action.php" method="post" class="form" enctype="multipart/form-data">
		<h1>Edit info Barang</h1>
		<?php foreach ($item as $key): ?>
			<center>
			<?php echo "<img height='130' src='$key[Gambar]'>"; ?>
			<?php $id = $key['IDItem']; ?>
			</center>
		<?php endforeach?>
		
		<?php echo "<input type='text' name='id' value='$id'>"; ?>
		
		
		<input type="text" name="nama" placeholder="Nama Barang">
		<input type="text" name="harga" placeholder="Harga Barang">
		<input type="text" name="stok" placeholder="Stok Barang">
		<input type="submit" name="edit" value="Edit">
	</form>
</div>
</body>
</html>