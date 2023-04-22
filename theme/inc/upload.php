<?php
    require_once("./db.php");
        if(isset($_POST['submit'])){
            $v1=rand(1111,9999);
            $v2=rand(1111,9999);
            $v3=$v1.$v2;
            $v3=md5($v3);
            $fnm=basename($_FILES["img"]["name"]);
            $path="../images/products/";
            if(!file_exists($path)){
                mkdir($path);
            }
            $target=$path.$v3.$fnm;
            $target1="images/products/";
            $proname=$_POST['productname'];
            $price=$_POST['price'];
            $sale=$_POST['sale'];
            $saleprice=($price*$sale)/100;
            $newprice=$price-$saleprice;
            $des=$_POST['des'];
            $sql="INSERT INTO product(pname,price,sale,new_price,descr,img) VALUES ('$proname','$price','$sale',
            '$newprice','$des','$target1')";
            if(!mysqli_query($conn,$sql))
            {
                header("Location: ../addproducts.php?fail"); 
            }else
            {
                move_uploaded_file($_FILES["img"]["tmp_name"],$target);
                header("Location: ../addproducts.php?uploadsuccess");
            }            
        }
    ?>