<?php require_once('admin/inc/db.php');
session_start();

if(isset($_SESSION['customer'])){
	$info_us = $_SESSION['customer'];
	$info_query = "select * from taikhoan tk left join users u on tk.Idtk = u.Idtk  where tk.Idtk = '$info_id'";
	$info_run = $conn->query($info_query);
	
	if($info_run -> num_rows > 0){
		$info_row = $info_run -> fetch_array();
        $info_username = $info_row['Username'];
		$info_password = $info_row['Password'];
		$info_name = $info_row['Ten'];
        $info_address = $info_row['Diachi'];
		$info_email = $info_row['Mail'];
		$info_phone = $info_row['Sdt'];
	}
}

?>

<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
