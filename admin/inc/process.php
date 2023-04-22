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
		$query = "INSERT INTO theloai VALUES ('$cat_name')";
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
		header("location: ../categories.php?editerror=Category Name require&edit=$edit_id");
	}
	else{
		$query = "UPDATE theloai SET Tenloai = '$edit_cat_name' WHERE Idloai = '$edit_id';";
		//UPDATE `categories` SET `cat_id` = '888', `cat_name` = 'hellop' WHERE `categories`.`cat_id` = 4;
		if(mysqli_query($conn, $query)){
			echo "<script>alert('Sửa thể loại thành công!');window.location='../categories.php'</script>";
		}
		else{
			echo "<script>alert('Sửa thể loại thất bại!');window.location='../categories.php'</script>";
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
	$edit_pro_id = $_GET['edit_product'];
  	$pro_name = $_POST['e-pro-name'];
  	$pro_price = $_POST['e-pro-price'];
  	$pro_sale = $_POST['e-pro-sale'];
  	$pro_newprice = $pro_price - ($pro_price*($pro_sale/100));
  	$pro_subcate = $_POST['e-pro-subcate'];
  	$pro_des = $_POST['e-pro-des']; 
  
  	$file = $_FILES['image']['tmp_name'];
    if($file!="") {
        $image_check = getimagesize($_FILES['image']['tmp_name']);
		$image = file_get_contents ($_FILES['image']['tmp_name']);
		$image_name = $_FILES['image']['name'];
		$update_query = "UPDATE `product` SET `pname`='$pro_name',`price`='$pro_price',`sale`='$pro_sale',`new_price`='$pro_newprice',`subcate_id`='$pro_subcate',`descr`='$pro_des',`img`='$image_name' WHERE `pid` = '$edit_pro_id';";
    } else {
		$update_query = "UPDATE `product` SET `pname`='$pro_name',`price`='$pro_price',`sale`='$pro_sale',`new_price`='$pro_newprice',`subcate_id`='$pro_subcate',`descr`='$pro_des' WHERE `pid` = '$edit_pro_id';";
    }
	if(mysqli_query($conn, $update_query)){
		echo "<script>alert('Edit product success! Product has been edited.');window.location='../products.php'</script>";
	}
	else{
		echo "<script>alert('Edit product fail! Some error has occurred.');window.location='../products.php'</script>";
	}
}
//////////////////////// ADD PRODUCT //////////////////////

if(isset($_POST['add-product1'])){
	$add_pro_names = $_POST['add-pro-names'];
  	$add_pro_price = $_POST['add-pro-price'];
  	$add_pro_sale = $_POST['add-pro-sale'];
  	$add_pro_newprice = $add_pro_price - ($add_pro_price*($add_pro_sale/100));
  	$add_pro_subcate = $_POST['add-pro-subcate'];
  	$add_pro_des = $_POST['add-pro-des'];

 	$file = $_FILES['image']['tmp_name'];
 	$image_check = getimagesize($_FILES['image']['tmp_name']);
	$image = file_get_contents ($_FILES['image']['tmp_name']);
	$image_name = $_FILES['image']['name'];
	  
	$insert_pro = "INSERT INTO `product`( `pname`, `price`, `sale`, `new_price`, `subcate_id`, `descr`, `img`) VALUES ('$add_pro_names','$add_pro_price','$add_pro_sale','$add_pro_newprice','$add_pro_subcate','$add_pro_des','$image_name');";	
	
	if(mysqli_query($conn, $insert_pro)){
		echo "<script>alert('Add product success! Product has been added.');window.location='../products.php'</script>";
	}
	else{
		echo "<script>alert('Add product fail! Some error has occurred.');window.location='../products.php'</script>";
	}
	
}

?>