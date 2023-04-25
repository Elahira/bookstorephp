<?php require_once('inc/top.php'); ?>
<title>Nhà phát hành</title>
<?php
if (isset($_GET['del']) and isset($_SESSION['usernameadmin'])) {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM nhaphathanh WHERE Idnph = '$del_id'";
    try{
        $conn->query($del_query);
        echo "<script>alert('Xóa nhà phát hành thành công!');window.location='./publisher.php'</script>";
    }
    catch(Exception $e){
        echo "<script>alert('Xóa nhà phát hành thất bại!');window.location='./publisher.php'</script>";
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
                        <li class="breadcrumb-item active">Nhà phát hành</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Thêm nhà phát hành</h4>
                                </div>
                                <form action="inc/process.php" method="post">
                                    <div class="form-group">
                                        <label for="publisher">Tên nhà phát hành:*</label>
                                        <input type="text" placeholder="Tên nhà phát hành..." class="form-control" name="pub-name" required>
                                    </div>
                                    <input type="submit" value="Thêm" name="add-publisher" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['edit'])) {
                            $edit_id = $_GET['edit'];
                            $get_pub_id = "SELECT * from nhaphathanh where Idnph = '$edit_id'";
                            $run_edit_id = $conn->query($get_pub_id);
                            if ($run_edit_id->num_rows > 0) {
                                $row_edit_id = $run_edit_id->fetch_array();
                                $edit_name = $row_edit_id['Tennph'];
                        ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h4>Sửa nhà phát hành</h4>
                                        </div>
                                        <form action="inc/process.php?edit_publisher=<?php echo $edit_id ?>" method="post">
                                            <div class="form-group">
                                                <label for="publisher">Tên nhà phát hành mới:*</label>
                                                <input type="text" placeholder="Nhà phát hành..." class="form-control" name="edit-pub-name" value="<?php echo $edit_name; ?>" required>
                                            </div>
                                            <input type="submit" value="Sửa" name="edit-publisher" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Nhà phát hành</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã nhà phát hành</th>
                                                <th>Tên nhà phát hành</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM nhaphathanh order by Idnph asc";
                                            $run = $conn->query($query);
                                            if ($run->num_rows > 0) {
                                                while ($row = $run->fetch_array()) {
                                                    $pub_id = $row['Idnph'];
                                                    $pub_name = $row['Tennph'];
                                            ?>
                                                    <tr>
                                                        <td><?php echo $pub_id ?></td>
                                                        <td><?php echo $pub_name ?></td>
                                                        <td><a href="publisher.php?edit=<?php echo $pub_id ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a></td>
                                                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $pub_id ?>"><i class="fa fa-close"></i></button></td>
                                                    </tr>
                                                    <div class="modal fade" id="exampleModal<?php echo $pub_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="exampleModalLabel<?php echo $pub_id ?>" style="margin: auto;text-align: center;">
                                                                        <svg width="24" height="24" class="dialog-content__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                                                                            <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                                                                        </svg>
                                                                        Xóa nhà phát hành
                                                                    </h3>
                                                                </div>
                                                                <div class="modal-body" style="margin: auto;">
                                                                    <h6 style="font-family: Roboto,Helvetica,Arial,sans-serif; font-size:16px;">Bạn có chắc muốn xóa <?php echo $pub_name ?> không?</h6>
                                                                </div>
                                                                <div class="modal-footer" style="margin: auto;">
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                                                    <a href="publisher.php?del=<?php echo $pub_id ?>"><button type="button" class="btn btn-outline-danger">Xác nhận</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            } else {
                                                echo "Không tìm thấy nhà phát hành";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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