<?php
require_once( 'admin/inc/db.php' );
session_start();

//////////////////////// ADD USER //////////////////////

if (isset($_POST['add-user'])) {
	$user_yourname = $_POST['yourname'];
	$user_email = $_POST['val-email'];
	$user_phone = $_POST['phone'];
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
	$user_address = $_POST['address'];
	$user_permission = "2";

	$query = "INSERT INTO taikhoan (Username,Password,Idrole) VALUES ('$user_username','$user_password','$user_permission');";

	if ($conn->query($query)) {
		$query = "SELECT Idtk FROM taikhoan WHERE Username='$user_username'";
		$runcheck = $conn->query($query);
		$rowcheck = $runcheck->fetch_array();
		$user_id = $rowcheck['Idtk'];
		$query_id = "INSERT INTO users (Ten,Sdt,Diachi,Mail,Idtk) VALUES ('$user_yourname','$user_phone','$user_address','$user_email','$user_id')";
		if ($conn->query($query_id)) {
			echo "<script>alert('Thêm người dùng thành công!');window.location='../users.php'</script>";
		} else {
			echo "<script>alert('Thêm người dùng thất bại!');window.location='../users.php'</script>";
		}
	} else {
		echo "<script>alert('Thêm người dùng thất bại!');window.location='../users.php'</script>";
	}
}

?>