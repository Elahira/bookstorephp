<?php require_once('inc/top.php'); ?>
<title>Người dùng</title>
<?php
if (isset($_GET['del']) and isset($_SESSION['usernameadmin'])) {
  $check = $_GET['del'];
  $querycheck = "SELECT Idrole FROM taikhoan WHERE Idtk = '$check';";
  $runcheck = $conn ->query($querycheck);
  if ($runcheck ->num_rows > 0) {
    $rowcheck = $runcheck ->fetch_array();
    $user_per = $rowcheck['Idrole'];

    if ($user_per == '1') {
      echo "<script>alert('Bạn không có quyền xóa tài khoản Admin');window.location='./users.php'</script>";
    } else {
      $del_query1 = "DELETE FROM users WHERE Idtk = '$check';";
      $del_query2 = "DELETE FROM taikhoan WHERE Idtk = '$check';";
      //$del_run
      try{
        $conn ->query($del_query1); 
        $conn ->query($del_query2);
        echo "<script>alert('Xóa người dùng thành công!');window.location='./users.php'</script>";
      }
      catch (Exception $e){
        echo "<script>alert('Xóa người dùng thất bại!');window.location='./users.php'</script>";
      }
    }
  }
}
?>
</head>

<body>

    <?php require_once('inc/preload.php'); ?>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <?php require_once('inc/web-form.php'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3>Người dùng</h3>
                            </div>
                            <a href='user-add.php'>
                                <button style="margin-bottom: 20px" class='btn btn-primary'><span style="margin-right: 10px">Thêm người dùng</span><i class="fa fa-plus"></i></button>
                                </span></a>
                            <div class="table-responsive">                             
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 13%;">Tên</th>
                                            <th style="width: 13%;">Email</th>
                                            <th style="width: 10%;">Số điện thoại</th>
                                            <th style="width: 15%;">Địa chỉ</th>
                                            <th style="width: 5%;">Payment</th>
                                            <th style="width: 11%;">Username</th>
                                            <th style="width: 11%;">Password</th>
                                            <th style="width: 7%;">Quyền hạn</th>
                                            <th style="width: 5%;">Sửa</th>
                                            <th style="width: 5%;">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM taikhoan tk LEFT JOIN `role` r ON tk.Idrole = r.Idrole 
                                        LEFT JOIN users u ON u.Idtk = tk.Idtk ORDER BY tk.Idtk asc;";
                                        $run = $conn->query($query);
                                        if ($run->num_rows > 0) {
                                            while ($row = $run->fetch_array()) {
                                                $user_id = $row['Idtk'];
                                                $user_name = $row['Ten'];
                                                $user_email = $row['Mail'];
                                                $user_phone = $row['Sdt'];
                                                $user_address = $row['Diachi'];
                                                $user_username = $row['Username'];
                                                $user_password = $row['Password'];
                                                $user_permission = $row['Rolename'];
                                                $user_password = md5($user_password);
                                        ?>
                                                <tr>
                                                    <td><?php echo $user_id ?></a></td>
                                                    <td><?php echo $user_name ?></a></td>
                                                    <td><?php echo $user_email ?></td>
                                                    <td><?php echo $user_phone ?></td>
                                                    <td><?php echo $user_address ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong<?php echo $user_id ?>">Bank</button>
                                                    </td>
                                                    <td><?php echo $user_username ?></td>
                                                    <td id="pw<?php echo $user_id ?>" onClick="showhidepw<?php echo $user_id ?>()">******</td>
                                                    <script>
                                                        function showhidepw<?php echo $user_id ?>() {
                                                            var passwork = document.getElementById("pw<?php echo $user_id ?>").innerHTML;
                                                            if (passwork == ("******")) {
                                                                $("#pw<?php echo $user_id ?>").html("<?php echo $user_password ?>");
                                                            } else {
                                                                $("#pw<?php echo $user_id ?>").html("******");
                                                            }
                                                        }
                                                    </script>
                                                    
                                                    <td><span class="label gradient-5 rounded"><?php echo $user_permission ?></span></td>
                                                    <td><a <?php echo "href='user-edit.php?edit=$user_id'"; ?>>
                                                            <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                                        </a></td>
                                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $user_id ?>"><i class="fa fa-close"></i></button></td>
                                                </tr>

                                                <!-- del user -->
                                                <div class="modal fade" id="exampleModal<?php echo $user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" id="exampleModalLabel<?php echo $user_id ?>" style="margin: auto;text-align: center;">
                                                                    <svg width="24" height="24" class="dialog-content__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                                                                        <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                                                                    </svg>
                                                                    Xóa người dùng
                                                                </h3>
                                                            </div>
                                                            <div class="modal-body" style="margin: auto;">
                                                                <h6 style="font-family: Roboto,Helvetica,Arial,sans-serif; font-size:16px;">Bạn có chắc muốn xóa người dùng này không?</h6>
                                                            </div>
                                                            <div class="modal-footer" style="margin: auto;">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                                                <a href="users.php?del=<?php echo $user_id ?>">
                                                                    <button type="button" class="btn btn-outline-danger">Xác nhận</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php

                                            }
                                        } else {
                                            echo "Người dùng: 0";
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT * FROM users u
                    LEFT JOIN users_payment upay ON u.Iduser = upay.Iduser";
                    $run = $conn->query($query);
                    if ($run->num_rows > 0) {
                        while ($row = $run->fetch_array()) {
                            $user_id = $row['Idtk'];
                            $user_name = $row['Ten'];
                            $user_email = $row['Mail'];
                            $user_phone = $row['Sdt'];
                            $user_address = $row['Diachi'];
                    ?>
                            <div class="modal fade" id="exampleModalLong<?php echo $user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle<?php echo $user_id ?>" style="color:#7571f9;">Danh sách ngân hàng của <?php echo $user_name ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table id="table-detail-<?php echo $user_id ?>" class="table table-bordered table-striped table-hover">
                                                        <tr>
                                                            <th>Stt</th>
                                                            <th>Ngân hàng</th>
                                                            <th>Số tài khoản</th>
                                                            <th>Tên tài khoản</th>
                                                        </tr>
                                                        <?php
                                                        $querybank = "SELECT * FROM users_payment
                                                                            WHERE Iduser = '$user_id'";
                                                        $runbank = $conn->query($querybank);
                                                        $bank_count = 0;
                                                        if ($runbank->num_rows > 0) {
                                                            while ($rowbank = $runbank->fetch_array()) {
                                                                $bank_count++;
                                                                $bank_name = $rowbank['Bank'];
                                                                $bank_num = $rowbank['Sotk'];
                                                                $bank_acc = $rowbank['Tentk'];
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $bank_count ?></td>
                                                                    <td><?php echo $bank_name ?></td>
                                                                    <td> <?php echo $bank_num ?></td>
                                                                    <td> <?php echo $bank_acc ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "0";
                    }
                    ?>

                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php require_once('inc/footer.php'); ?>