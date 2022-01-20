<?php require ('Admin Action.php');
	session_start();
	if (isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Akun</title>
	<link rel="stylesheet" type="text/css" href="Style2.css">
</head>
<body>

	<?php $user = $action->UserDetail($_GET['IDUser']) ?>
	<?php foreach ($user as $key): ?>

		<div class="account">
			<h1>Akun</h1>
			<h3><?= $key['NamaLengkap'] ?></h6>
			<p><?= $key['Email'] ?></p>
			<p><?= $key['Alamat'] ?></p>
			<p><?= $key['KodePos'] ?></p>
		</div>

	<?php endforeach ?>

</body>
</html>
<?php
}else{
	echo "<script> location='Login.php'; </script>";
}
?>