	<?php 

class Action{

	var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "coffeeshop";
	
	function __construct(){
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password);
		mysqli_select_db($this->conn, $this->database);
	}

	public function Registration(){

		$sql = "SELECT * FROM user WHERE Email = '$_POST[mail]'";
		$result = $this->conn->query($sql);
		$row = mysqli_num_rows($result);

		if ($row > 0) {
			echo "<script> alert ('Email yang anda masukkan sudah terdaftar, gunakan email yang lain'); </script>";
		}
		else{
			if (strcmp($_POST['pass'], $_POST['repass']) != 0) {
				echo "<script> alert ('Password belum cocok'); </script>";
			}
			else{
				$hash = password_hash($_POST['pass'], PASSWORD_DEFAULT); 
				$insert = "INSERT INTO user (NamaLengkap, Email, Alamat, KodePos, Password) VALUES ('$_POST[name]', '$_POST[mail]', '$_POST[alamat]', '$_POST[pos]', '$hash')";
											
				if ($insert) {
					$hasil = $this->conn->query($insert);
					
					if ($hasil) {
						echo "<script> alert ('Registrasi berhasil'); </script>";
					}
					else{
						echo "<script> alert ('Registrasi Gagal'); </script>";
					}	
				}
			}
		}
		echo "<script> location='Registrasi.php'; </script>";
	}

	public function Login (){
		$sql = "SELECT * FROM user WHERE Email = '$_POST[mail]'";
		$result = $this->conn->query($sql);
		$row = mysqli_num_rows($result);
		
		if ($row > 0) {
			$user = mysqli_fetch_assoc($result);
			
			if (password_verify($_POST['pass'], $user['Password'])) {
				session_start();
				$_SESSION['user']=$user['IDUser'];
				echo "<script> alert ('Login berhasil')</script>;";
				echo "<script> location='Store.php'; </script>";
			}
			else{
				echo "<script> alert ('Password salah')</script>;";
			}
		}
		else{
			echo "<script> alert ('Email belum terdaftar')</script>;";
		}
		echo "<script> location='Login.php'; </script>";
	}

	public function UpdatePassword (){

		$sql = "SELECT * FROM user WHERE Email = '$_POST[mail]'";
		$result = $this->conn->query($sql);
		$row = mysqli_num_rows($result);
			
		if ($row > 0) {
			if (strcmp($_POST['pass'], $_POST['repass']) != 0) {
				echo "<script> alert ('Password belum cocok')</script>;";
			}
			else{
				$hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
				$sql = "UPDATE user SET Password = '$hash' WHERE Email = '$_POST[mail]'";
				$result = $this->conn->query($sql);
				echo "<script> alert ('Password telah diperbarui')</script>;";
				echo "<script> location='Login.php'; </script>";
			}				
		}
		else{
			echo "<script> alert ('Email tidak terdaftar')</script>;";
		}
		echo "<script> location='Forgot Password.php'; </script>";
	}

	public function ItemList (){
		$sql = "SELECT * FROM item";
		return $this->conn->query($sql);
	}
	public function SearchItemList ($search){
		$sql = "SELECT * FROM item WHERE Nama LIKE '%".$search."%'";
		return $this->conn->query($sql);
	}

	public function UserDetail ($id){
		$sql = "SELECT * FROM user WHERE IDUser='$id'";
		return $this->conn->query($sql);
	}

	public function AddtoCart ($IDItem, $HargaItem){
		session_start();
		$sql = "INSERT INTO cart (IDUser, IDItem, HargaItem) VALUES ($_SESSION[user], '$IDItem', '$HargaItem')";
		$result = $this->conn->query($sql);

		if ($result) {
			echo "<script> alert ('Barang berhasil masuk ke keranjang')</script>;";
		}else{
			echo "<script> alert ('Gagal')</script>;";
		}
		echo "<script> location='Store.php'; </script>";
	}

	public function InCart (){
		$sql = "SELECT * FROM cart WHERE IDUser='$_SESSION[user]'";
		return $this->conn->query($sql);
	}

	public function CartItemList ($IDItem){
		$sql = "SELECT * FROM item WHERE IDItem = '$IDItem'";
		return $this->conn->query($sql);
	}

	public function TotalPrice (){
		$total = 0;
		$sql = "SELECT * FROM cart WHERE IDUser='$_SESSION[user]'";
		$result = $this->conn->query($sql);
		while ($row = mysqli_fetch_array($result)) {
			$total += $row['HargaItem'];
		}
		return $total;
	}

	public function DeleteItemCart ($IDCart){
		$sql 	= "DELETE FROM `cart` WHERE `cart`.`IDCart` = '$IDCart'";
		$result = $this->conn->query($sql);

		if ($result) {
			echo "<script> alert ('Barang berhasil keluar dari keranjang')</script>;";
		}else{
			echo "<script> alert ('Gagal')</script>;";
		}
		echo "<script> location='Cart.php'; </script>";
	}

	public function Checkout(){
		session_start();
		$sql 	= "INSERT INTO checkout (IDUser, MetodeBayar, MetodeKirim, Status) VALUES ($_SESSION[user], '$_POST[bayar]', '$_POST[kirim]', 'Dalam Proses')";
		$result = $this->conn->query($sql);

		if ($result) {
			$sql = "SELECT LAST_INSERT_ID();";
			$result = $this->conn->query($sql);
			$id  = mysqli_fetch_array($result);

			$sql = "SELECT IDItem FROM cart WHERE IDUser = '$_SESSION[user]'";
			$result = $this->conn->query($sql);
			$IDItem = mysqli_fetch_array($result);

			$n = -1;
			foreach ($IDItem as $key) {
				$sql = "INSERT INTO `checkout_items`(`IDItem`, `IDCheckout`) VALUES ('$key[IDItem][$n]', '$id[0]');";
				$result = $this->conn->query($sql);
				$n++;
			}
	
			echo "<script> alert ('Barang berhasil dibeli')</script>;";
		}else{
			echo "<script> alert ('Gagal')</script>;";
		}
		echo "<script> location='Cart.php'; </script>";
	}
}

$action = new Action();

if (isset($_POST['create'])) {
	$action->Registration();
}

if (isset($_POST['login'])) {
	$action->Login();
}

if (isset($_POST['update'])) {
	$action-> UpdatePassword();
}

if (isset($_GET['IDItem'], $_GET['HargaItem'])) {
	$action-> AddtoCart($_GET['IDItem'], $_GET['HargaItem']);
}

if (isset($_GET['IDCart'])) {
	$action-> DeleteItemCart($_GET['IDCart']);
}

if (isset($_POST['checkout'])) {
	$action-> Checkout();
}

 ?>