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


	public function AdminLogin (){
		if (!strcmp($_POST['admin'], "admin")) {
			if (!strcmp($_POST['pass'], "admin")) {
				echo "<script> alert ('Selamat Datang')</script>;";
			}
			else{
				echo "<script> alert ('Gagal')</script>;";
			echo "<script> location='Admin Login.php'; </script>";
			}
		}
		else{
			echo "<script> alert ('Gagal')</script>;";
			echo "<script> location='Admin Login.php'; </script>";
		}
		echo "<script> location='Item List.php'; </script>";
	}

	public function UserList (){ 
		$sql = "SELECT * FROM user";
		return $this->conn->query($sql);
	}
	public function SearchUserList ($search){
		$sql = "SELECT * FROM user WHERE NamaLengkap LIKE '%".$search."%'";
		return $this->conn->query($sql);
	}

	public function UserDetail ($id){
		$sql = "SELECT * FROM user WHERE IDUser='$id'";
		return $this->conn->query($sql);
	}

	public function ItemList (){
		$sql = "SELECT * FROM item";
		return $this->conn->query($sql);
	}
	public function SearchItemList ($search){
		$sql = "SELECT * FROM item WHERE Nama LIKE '%".$search."%'";
		return $this->conn->query($sql);
	}

	public function AddItem(){
		$img_name = basename($_FILES['gambar']['name']);
		$target_file = 'Image/'. $img_name;
		$img_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		if (! move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)){
			echo "<script>alert ('gambar gagal masuk ke folder'); </script>";
		}
		else{
			$sql = "INSERT INTO item (Gambar, Nama, Harga, Stok) VALUES ('$target_file', '$_POST[nama]', '$_POST[harga]', 
			'$_POST[stok]')";
			$result = $this->conn->query($sql);
			if ($result) {
				echo "<script>alert ('Berhasil menambahkan barang'); </script>";
			}
			else{
				echo "<script>alert ('Gagal menambahkan barang'); </script>";
			}
		}
		echo "<script> location='Item List.php' </script>";
	}

	public function ItemDetail ($id){
		$sql = "SELECT * FROM item WHERE IDItem='$id'";
		return $this->conn->query($sql);
	}

	public function EditItem (){
		$sql = "UPDATE item SET Nama = '$_POST[nama]', Harga = '$_POST[harga]', Stok = '$_POST[stok]' WHERE IDItem = '$_POST[id]' ";
		$result = $this->conn->query($sql);
		if($result){
			echo "<script> alert ('Berhasil diubah')</script>;";			
		}
		else{
			echo "<script> alert ('Gagal')</script>;";
		}
		echo "<script> location='Item List.php'; </script>";
	}

}

$action = new Action();

if (isset($_POST['login'])) {
	$action->AdminLogin();
}

if (isset($_POST['tambah'])) {
	$action->AddItem();
}

if (isset($_POST['edit'])) {
	$action->EditItem();
}

 ?>