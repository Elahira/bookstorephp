<?php
require_once('db.php');

session_start();

if(!isset($_SESSION['usernameadmin'])){
	header('location: ../page-login.php');
}

//////////////////////// ADD CATEGORY //////////////////////

if(isset($_POST['add-category'])){
	$cat_id = $_POST['cat-id'];
	$cat_name = $_POST['cat-name'];
	
	if(empty($cat_name)){
		header('location: ../categories.php?error=Category Name require');
	}
	else{
		$query = "INSERT INTO theloai(Tenloai) VALUES ('$cat_name')";
		if($conn ->query($query)){
			echo "<script>alert('Thêm thể loại thành công!');window.location='../categories.php'</script>";
		}
		else{
			echo "<script>alert('Thêm thể loại thất bại!');window.location='../categories.php'</script>";
		}
	}
}

//////////////////////// EDIT CATEGORY //////////////////////

if(isset($_POST['edit-category'])){
	$edit_id = $_GET['edit_category'];
	$edit_cat_name = $_POST['edit-cat-name'];
	
	if(empty($edit_cat_name)){
		header("location: ../publisher.php?editerror=Category Name require&edit=$edit_id");
	}
	else{
		$query = "UPDATE theloai SET Tenloai = '$edit_cat_name' WHERE Idloai = '$edit_id';";
		if($conn ->query($query)){
			echo "<script>alert('Sửa thành công!');window.location='../categories.php'</script>";
		}
		else{
			echo "<script>alert('Sửa thất bại!');window.location='../categories.php'</script>";
		}
	}
}

//////////////////////// ADD PUBLISHER //////////////////////

if(isset($_POST['add-publisher'])){
	$pub_id = $_POST['pub-id'];
	$pub_name = $_POST['pub-name'];
	
	if(empty($pub_name)){
		header('location: ../publisher.php?error=Publisher Name require');
	}
	else{
		$query = "INSERT INTO nhaphathanh(Tennph) VALUES ('$pub_name')";
		if($conn ->query($query)){
			echo "<script>alert('Thêm nhà phát hành thành công!');window.location='../publisher.php'</script>";
		}
		else{
			echo "<script>alert('Thêm nhà phát hành thất bại!');window.location='../publisher.php'</script>";
		}
	}
}

//////////////////////// EDIT PUBLISHER //////////////////////

if(isset($_POST['edit-publisher'])){
	$edit_id = $_GET['edit_publisher'];
	$edit_pub_name = $_POST['edit-pub-name'];
	
	if(empty($edit_pub_name)){
		header("location: ../publisher.php?editerror=Publisher Name require&edit=$edit_id");
	}
	else{
		$query = "UPDATE nhaphathanh SET Tennph = '$edit_pub_name' WHERE Idnph = '$edit_id';";
		if($conn ->query($query)){
			echo "<script>alert('Sửa thành công!');window.location='../publisher.php'</script>";
		}
		else{
			echo "<script>alert('Sửa thất bại!');window.location='../publisher.php'</script>";
		}
	}
}

//////////////////////// EDIT USER //////////////////////

if(isset($_POST['edit-user'])){
	$user_id = $_POST['edit-user'];
	$user_name = $_POST['yourname'];
	$user_email = $_POST['val-email'];
	$user_phone = $_POST['phone'];
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
	$user_address =	$_POST['address'];
	
	$query = "SELECT username FROM account NOT id='$user_id'";
	$run = mysqli_query($conn, $query);
	if(mysqli_num_rows($run)>0){
		while($row = mysqli_fetch_array($run)){
			$user_checkname = $row['username'];
			if($user_username==$user_checkname)
				header("location: ../user-edit.php?edit=$user_id&error=Username invalid!");
		}
	}
	else{
		$query = "UPDATE account SET
		username='$user_username',
		password='$user_password' 
		WHERE accID='$user_id';";
		
		$query2 = "UPDATE customer SET
		cusEmail='$user_email',
		cusPhoneNumber='$user_phone',
		cusName='$user_name',
		cusAddress='$user_address' 
		WHERE accountId='$user_id';";
		
		
		if(mysqli_query($conn, $query) && mysqli_query($conn, $query2)){
			echo "<script>alert('Edit user success! User has been edited.');window.location='../sub-user.php'</script>";
		}
		else{
			echo "<script>alert('Edit user fail! Some error has occurred.');window.location='../sub-user.php'</script>";
		}	
	}
}

//////////////////////// ADD USER //////////////////////

if(isset($_POST['add-user'])){
	$user_yourname = $_POST['yourname'];
	$user_email = $_POST['val-email'];
	$user_phone = $_POST['phone'];
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];
	$user_address = $_POST['address'];
	$user_permission = "2";
	
//	echo "$user_email $user_username $user_password";
//	$query = "SELECT username FROM account";
//	$run = mysqli_query($conn, $query);
//	if(mysqli_num_rows($run)>0){
//		while($row = mysqli_fetch_array($run)){
//			$user_checkname = $row['username'];
//			if($user_username==$user_checkname)
//				header("location: ../user-register.php?error=Username invalid!");
//		}
//	}
		$query = "INSERT INTO account (username,password,role_id) VALUES ('$user_username','$user_password','$user_permission');";
		
		if(mysqli_query($conn, $query)){
			$query = "SELECT accID FROM account WHERE username='$user_username'";
			$runcheck = mysqli_query($conn, $query);
			$rowcheck = mysqli_fetch_array( $runcheck );
			$user_id = $rowcheck[ 'accID' ];
			$query_id = "INSERT INTO customer (cusName,cusPhoneNumber,cusAddress,cusEmail,accountID) VALUES ('$user_yourname','$user_phone','$user_address','$user_email','$user_id')";
			if(mysqli_query($conn, $query_id)){
				echo "<script>alert('Add user success! User has been added.');window.location='../sub-user.php'</script>";
			}
			else{
				echo "<script>alert('Add user fail! Some error has occurred.');window.location='../sub-user.php'</script>";
			}
		}
		else{
			echo "<script>alert('Add user fail! Some error has occurred.');window.location='../sub-user.php'</script>";
		}
}

//////////////////////// EDIT PRODUCT //////////////////////

if(isset($_POST['edit-product'])){
	$pro_id = $_POST['e-pro-id'];
	$pro_name = $_POST['e-pro-name'];
	$pro_author = $_POST['e-pro-author'];
	$pro_illu = $_POST['e-pro-illu'];
	$pro_trans = $_POST['e-pro-trans'];
	$pro_cover = $_POST['e-pro-cover'];
	$pro_pages = $_POST['e-pro-pages'];
  	$pro_price = $_POST['e-pro-price'];
  	$pro_sale = $_POST['e-pro-sale'];
  	$pro_newprice = $pro_price - ($pro_price*($pro_sale/100));
  	$pro_pub = $_POST['e-pro-pub'];
  	$pro_cat = $_POST['e-pro-cat'];
  	$pro_des = $_POST['e-pro-des'];

 	$file = $_FILES['image']['tmp_name'];
    if($file!="") {
        $image_check = getimagesize($_FILES['image']['tmp_name']);
		$image = file_get_contents ($_FILES['image']['tmp_name']);
		$image_name = $_FILES['image']['name'];
		$update_query = "UPDATE sanpham SET `Tensp`='$pro_name', `Tacgia`='$pro_author', `Minhhoa`='$pro_illu', `Dichgia`='$pro_trans', `Loaibia`='$pro_cover', `Sotrang`='$pro_pages', `Giasp`='$pro_price', `Giamgia`='$pro_sale', `Giamoi`='$pro_newprice', `Idloai`='$pro_cat', `Idnph`='$pro_pub', `Mota`='$pro_des', `Img`='$image_name' WHERE `Idsp` = '$pro_id';";
    } else {
		$update_query = "UPDATE sanpham SET `Tensp`='$pro_name', `Tacgia`='$pro_author', `Minhhoa`='$pro_illu', `Dichgia`='$pro_trans', `Loaibia`='$pro_cover', `Sotrang`='$pro_pages', `Giasp`='$pro_price', `Giamgia`='$pro_sale', `Giamoi`='$pro_newprice', `Idloai`='$pro_cat', `Idnph`='$pro_pub', `Mota`='$pro_des' WHERE `Idsp` = '$pro_id';";
    }
	if($conn ->query($update_query)){
		echo "<script>alert('Sửa thành công!');window.location='../products.php'</script>";
	}
	else{
		echo "<script>alert('Sửa thất bại!');window.location='../products.php'</script>";
	}
}
//////////////////////// ADD PRODUCT //////////////////////

if(isset($_POST['add-product'])){
	$add_pro_name = $_POST['add-pro-name'];
	$add_pro_author = $_POST['add-pro-author'];
	$add_pro_illu = $_POST['add-pro-illu'];
	$add_pro_trans = $_POST['add-pro-trans'];
	$add_pro_cover = $_POST['add-pro-cover'];
	$add_pro_pages = $_POST['add-pro-pages'];
  	$add_pro_price = $_POST['add-pro-price'];
  	$add_pro_sale = $_POST['add-pro-sale'];
  	$add_pro_newprice = $add_pro_price - ($add_pro_price*($add_pro_sale/100));
  	$add_pro_pub = $_POST['add-pro-pub'];
  	$add_pro_cat = $_POST['add-pro-cat'];
  	$add_pro_des = $_POST['add-pro-des'];

 	$file = $_FILES['image']['tmp_name'];
 	$image_check = getimagesize($_FILES['image']['tmp_name']);
	$image = file_get_contents ($_FILES['image']['tmp_name']);
	$image_name = $_FILES['image']['name'];
	  
	$insert_pro = "INSERT INTO sanpham( `Tensp`, `Tacgia`, `Minhhoa`, `Dichgia`, `Loaibia`, `Sotrang`, `Giasp`, `Giamgia`, `Giamoi`, `Idloai`, `Idnph`, `Mota`, `Img`, `StatusSP`) 
	VALUES ('$add_pro_name', '$add_pro_author', '$add_pro_illu', '$add_pro_trans', '$add_pro_cover', '$add_pro_pages', '$add_pro_price','$add_pro_sale','$add_pro_newprice','$add_pro_cat', '$add_pro_pub', '$add_pro_des', '$image_name' , '1');";	
	
	if($conn ->query($insert_pro)){
		echo "<script>alert('Thêm sách mới thành công!');window.location='../products.php'</script>";
	}
	else{
		echo "<script>alert('Thêm sách mới thất bại!');window.location='../products.php'</script>";
	}
	
}
