<?php require ('Action.php');
	session_start();
	if (isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Akun</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

	<div class="left-container">
		<ul>
			<li><a href="#">Akun</a></li>
			<li><a href="#">Pesanan</a></li>
		</ul>
	</div>

	<div class="right-container">
		<table>
			<?php 
				$result = $action->UserDetail($_SESSION['user']); 
				$user = mysqli_fetch_array($result);

			echo "<tr>
				<td width='150'>Nama Lengkap</td>
				<td>: &nbsp; <input type='text' name='name' value='$user[NamaLengkap]'></td>
			</tr>
			<tr>
				<td width='150'>Email</td>
				<td>: &nbsp; <input type='email' name='mail' value='$user[Email]'></td>
			</tr>
			<tr>
				<td width='150'>Alamat</td>
				<td>: &nbsp; <input type='text' name='Alamat' value='$user[Alamat]'></td>
			</tr>
			<tr>
				<td align='right' colspan='2'><a href='#' class='button'>SIMPAN</a></td>
			</tr>";
			
			?>
		</table>
	</div>	

</body>
</html>

<?php
}else{
	echo "<script> location='Login.php'; </script>";
}
?>