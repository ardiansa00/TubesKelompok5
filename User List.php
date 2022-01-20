<?php require ('Admin Action.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar User</title>
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
		<h1>Daftar User</h1>
		<div class="search">
			<form method="get">
				<input type="text" name="search" placeholder="cari...">
			</form>
		</div>
		<table>
			<tr style="border-bottom: 5px solid #ffa42b;">
				<td width='250'>Nama Lengkap</td>
				<td width='450'>Email</td>
				<td width='70'>Aksi</td>
			</tr>						
		</table>

	<?php
		if (isset($_GET['search'])) {
			$result = $action->SearchUserList($_GET['search']);
		}else{
			require ('DBConn.php');

			$halaman = 5;
			$page 	= isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
			$mulai 	= ($page>1) ? ($page * $halaman) - $halaman : 0;

			$sql 	= "SELECT * FROM user";
			$query 	= mysqli_query($conn, $sql);
			$total	= mysqli_num_rows($query);
			$pages	= ceil($total/$halaman);
			$sqli	= "SELECT * FROM user LIMIT $mulai, $halaman";
			$result	= mysqli_query($conn, $sqli);
		}
		
		echo "<table>";
		while ($user = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td width='250'>".$user['NamaLengkap']."</td>";
				echo "<td width='450'>".$user['Email']."</td>";

				echo "<td width='70' align='center'>";
					echo "<a class='button2' href='DetailAccount.php?IDUser=$user[IDUser]'>Detail</a>";
				echo "</td>";				
			echo "</tr>";
		}
		echo "</table>";
	 ?>

	 <div class="page">
	 	<?php for ($i=1; $i <=$pages ; $i++){ ?>
	 		<a href="User List.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
	 	<?php } ?>
	 </div>
	 
	</center>
</body>
</html>