<?php require ('Action.php');
	session_start();
	if (isset($_SESSION['user'])) {
		$IDUser = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Store</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	
	<header>
		<a href="#" class="logo">coffee</a>
		<nav>
			<ul class="navbar">
				<li><a href="Store.php">Toko</a></li>
				<li><a href="Cart.php">Keranjang</a></li>
			</ul>
		</nav>
		<ul>
			<li class="dropdown"><a href="#"><img src="Image/user.png" height="32px"></a>
				<ul class="isi-dropdown">
					<li><a href="UserAccount.php">Akun</a></li>
					<li><a href="Logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>

	<div class="container">
		<div class="search">
			<form method="get">
				<input type="text" name="search" placeholder="cari...">
			</form>
		</div>
	<?php
		if (isset($_GET['search'])) {
			$result = $action->SearchItemList($_GET['search']);
		}else{
			require ('DBConn.php');

			$halaman = 4;
			$page 	= isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
			$mulai 	= ($page>1) ? ($page * $halaman) - $halaman : 0;

			$sql 	= "SELECT * FROM item";
			$query 	= mysqli_query($conn, $sql);
			$total	= mysqli_num_rows($query);
			$pages	= ceil($total/$halaman);
			$sqli	= "SELECT * FROM item LIMIT $mulai, $halaman";
			$result	= mysqli_query($conn, $sqli);
		}
		
		while ($item = mysqli_fetch_array($result)) {
				echo "
					<div class='card'>
						<img src='$item[Gambar]'>
						<h4>".$item['Nama']."</h1>
						<p>Rp, ".$item['Harga']."</p>
						<a href='Action.php?IDItem=$item[IDItem] & HargaItem=$item[Harga]'>tambah</a>
					</div>
				";
		}
	 ?>

	<div class="page">
	 	<?php for ($i=1; $i <=$pages ; $i++){ ?>
	 		<a href="Store.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
	 	<?php } ?>
	 </div>
	</div>

</body>
</html>

<?php
}else{
	echo "<script> location='Login.php'; </script>";
}
?>