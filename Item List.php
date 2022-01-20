<?php require ('Admin Action.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Barang</title>
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


	<center>
		<h1>Daftar Barang</h1>
		<div class="search">
		<form method="get">
			<input type="text" name="search" placeholder="cari...">
		</form>
			<a href="Add Item.php" class="button">Tambah</a>
		</div>
		<br><br>
		<table>
			<tr style="border-bottom: 5px solid #ffa42b;">
				<td width='150'>Gambar</td>
				<td width='200'>Nama Barang</td>
				<td width='200'>Harga</td>
				<td width='100'>Stok</td>
				<td width='100'>Aksi</td>
			</tr>						
		</table>

	<?php
		if (isset($_GET['search'])) {
			$result = $action->SearchItemList($_GET['search']);
		}else{
			require ('DBConn.php');

			$halaman = 5;
			$page 	= isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
			$mulai 	= ($page>1) ? ($page * $halaman) - $halaman : 0;

			$sql 	= "SELECT * FROM item";
			$query 	= mysqli_query($conn, $sql);
			$total	= mysqli_num_rows($query);
			$pages	= ceil($total/$halaman);
			$sqli	= "SELECT * FROM item LIMIT $mulai, $halaman";
			$result	= mysqli_query($conn, $sqli);
		}

		echo "<table style='margin-bottom: 50px;'>";
		while ($item = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td width='150' valign='center'><img height='75' src='$item[Gambar]'></td>";
				echo "<td width='200 '>".$item['Nama']."</td>";
				echo "<td width='200'>Rp, ".$item['Harga']."</td>";
				echo "<td width='100'>".$item['Stok']."</td>";

				echo "<td width='100'>";
					echo "<a class='button2' href='Edit Item.php?IDItem=$item[IDItem]'>Edit</a>";
				echo "</td>";				
			echo "</tr>";
		}
		echo "</table>";
	 ?>
	 
	 <div class="page">
	 	<?php for ($i=1; $i <=$pages ; $i++){ ?>
	 		<a href="Item List.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
	 	<?php } ?>
	 </div>

	</center>
</body>
</html>