<?php require ('Action.php');
	session_start();
	if (isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	
	<header>
		<a href="Home.html" class="logo">coffee</a>
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

	<div class="right-container" style="width: 60%; background-color: #fffff0">
		<table>
			<tr style="border-bottom: 5px solid #ffa42b;">
				<td width='150'>Gambar</td>
				<td width='200'>Nama Barang</td>
				<td width='200'>Harga</td>
				<td width='150'>Hapus</td>
			</tr>						
		</table>

		<?php $cart = $action->InCart() ?>
		<table class="cart">
			<?php foreach ($cart as $key): ?>

				<?php $item = $action->CartItemList($key['IDItem']) ?>
				<?php $total = 0; ?>
				<?php foreach ($item as $cart): ?>
				<tr>
					<td width="150"><img height="75px" src=<?= $cart['Gambar'] ?>></td>
					<td width="200"><?= $cart['Nama'] ?></td>
					<td width="200">Rp.<?= $key['HargaItem'] ?></td>
					<td width="150"><?php echo "<a href='Action.php?IDCart=$key[IDCart]'>Hapus</a>"; ?></td>
				</tr>
				<?php endforeach?>

			<?php endforeach ?>
		</table>
	</div>

	<div class="right-container" style="width: 30%; background-color: #fffff0; padding-top: 150px; float: right;">
		<form method="post" action="Action.php">
			<select name="bayar" class="select" style="width: 175px">
				<option selected="Pembayaran">Pembayaran</option>
				<option value="Mandiri">Mandiri</option>
				<option value="BNI">BNI</option>
				<option value="BRI">BRI</option>
			</select>
			<select name="kirim" class="select">
				<option selected="Pengiriman">Pengiriman</option>
				<option value="JNE">JNE</option>
				<option value="JNT">JNT</option>
				<option value="POS">POS</option>
			</select>
			<div class="total">Total Bayar : <?php $total = $action->TotalPrice() ?>Rp. <?= $total ?>.00</div>
			<input type="submit" name="checkout" value="checkout" class="submit">
		</form>
	</div>

</body>
</html>

<?php
}else{
	echo "<script> location='Login.php'; </script>";
}
?>