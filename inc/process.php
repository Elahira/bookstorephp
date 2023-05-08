<?php
require_once( 'admin/inc/db.php' );
session_start();

//////////////////////// ADD USER //////////////////////

if (isset($_POST['register'])) {
	$user_yourname = $_POST['name'];
	$user_email = $_POST['email'];
	$user_phone = $_POST['phone'];
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
	$user_permission = "2";

	$query = "INSERT INTO taikhoan (Username,Password,Idrole) VALUES ('$user_username','$user_password','$user_permission');";

	if ($conn->query($query)) {
		$query = "SELECT Idtk FROM taikhoan WHERE Username='$user_username'";
		$runcheck = $conn->query($query);
		$rowcheck = $runcheck->fetch_array();
		$user_id = $rowcheck['Idtk'];
		$query_id = "INSERT INTO users (Ten,Sdt,Mail,Idtk) VALUES ('$user_yourname','$user_phone','$user_email','$user_id')";
		if ($conn->query($query_id)) {
			echo "<script>alert('Đăng ký thành công!');window.location='../users.php'</script>";
		} else {
			echo "<script>alert('Đăng ký thất bại!');window.location='../users.php'</script>";
		}
	} else {
		echo "<script>alert('Đăng ký thất bại!');window.location='../users.php'</script>";
	}
}

?>