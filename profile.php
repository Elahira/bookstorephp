<?php require_once('inc/top.php') ?>
<!-- Site title -->
<title>Galio - Mega Shop Responsive Bootstrap 4 Template</title>
</head>

<body>

    <!-- color switcher start -->
    <?php require_once('inc/color-switcher.php') ?>

    <!-- color switcher end -->

    <div class="wrapper box-layout">

        <!-- header area start -->
        <?php require_once('inc/header.php') ?>
        <!-- header area end -->

        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>Dashboard</a>
                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Thông tin tài khoản</a>
                                        <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Phương thức thanh toán</a>
                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn hàng của tôi</a>
                                        <a href="logout.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <p class="mb-0">Họ tên: <strong><?php echo $info_name ?></strong></p>
                                                <p class="mb-0">Email: <strong><?php echo $info_email ?></strong></p>
                                                <p class="mb-0">Số điện thoại <strong><?php echo $info_phone ?></strong></p>
                                                <p class="mb-0">Địa chỉ <strong><?php echo $info_address ?></strong></p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Stt</th>
                                                                <th>Mã đơn hàng</th>
                                                                <th>Ngày đặt</th>
                                                                <th>Tình trạng</th>
                                                                <th>Xem chi tiết</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query = "SELECT * FROM hoadon where Idtk = '$info_id'";
                                                            $run = $conn->query($query);
                                                            if ($run->num_rows > 0) {
                                                                while ($row = $run->fetch_array()) {
                                                                    $hd_id = $row['Idhd'];
                                                                    $ngay_mua = $row['Ngaymua'];
                                                                    $ngay_nhan = $row['Ngaynhan'];
                                                                    $hd_status = $row['StatusHD'];
                                                            ?>
                                                                    <td><?php echo $hd_id ?></td>
                                                                    <td><?php echo $ngay_mua ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($hd_status == '1') {
                                                                        ?>
                                                                            <button type="button" class="btn btn-info">Chuẩn bị hàng</button>
                                                                        <?php
                                                                        }
                                                                        if ($hd_status == '2') {
                                                                        ?>
                                                                            <button type="button" class="btn btn-danger">Đang giao</button>
                                                                        <?php
                                                                        }
                                                                        if ($hd_status == '3') {
                                                                        ?>
                                                                            <button type="button" class="btn btn-success" style="color:#fff;" disabled>Đã giao</button>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $ngay_mua ?></td>
                                                                    <td><?php echo $ngay_mua ?></td>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Pending</td>
                                                                <td>$3000</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Payment Method</h3>
                                                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Thông tin tài khoản</h3>
                                                <div class="account-details-form">
                                                    <form id="frm-edit" method="POST" enctype="multipart/form-data">
                                                        <div class="single-input-item">
                                                            <label for="username" class="required">Tài khoản</label>
                                                            <input type="text" id="username" value="<?php echo $info_username ?>" disabled />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="name" class="required">Họ tên</label>
                                                            <input type="text" id="yourname" placeholder="Nhập họ tên" value="<?php echo $info_name ?>" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="phone" class="required">Số điện thoại</label>
                                                            <input type="number" id="phone" placeholder="Nhập số điện thoại" value="<?php echo $info_phone ?>" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Email</label>
                                                            <input type="email" id="email" placeholder="Nhập email" value="<?php echo $info_email ?>" />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="address" class="required">Địa chỉ</label>
                                                            <input type="text" id="address" placeholder="Nhập địa chỉ" value="<?php echo $info_address ?>" />
                                                        </div>
                                                        <fieldset>
                                                            <legend>Đổi mật khẩu</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Mật khẩu hiện tại</label>
                                                                <input type="password" id="current-pwd" placeholder="Nhập mật khẩu hiện tại" value="<?php echo $info_password ?>" />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">Mật khẩu mới</label>
                                                                        <input type="password" id="new-pwd" placeholder="Nhập mật khẩu mới" value="<?php echo $info_password ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Nhập lại mật khẩu mới</label>
                                                                        <input type="password" id="confirm-pwd" placeholder="Nhập lại mật khẩu mới" value="<?php echo $info_password ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button type="submit" name="edit-user" value="<?php echo $info_id ?>" class="check-btn sqr-btn ">Lưu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                        <script>
                                            $('#frm-edit').submit(function() {
                                                var edit_id = <?php echo $info_id; ?>;
                                                var edit_name = $('#yourname').val();
                                                var edit_email = $('#email').val();
                                                var edit_address = $('#address').val();
                                                var edit_phone = $('#phone').val();
                                                var edit_pwd = $('#current-pwd').val();
                                                var edit_new_pwd = $('#new-pwd').val();
                                                var edit_crm_pwd = $('#confirm-pwd').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'inc/process.php',
                                                    data: {
                                                        edit_user: edit_id,
                                                        edit_name: edit_name,
                                                        edit_phone: edit_phone,
                                                        edit_email: edit_email,
                                                        edit_address: edit_address,
                                                        current_pwd: edit_pwd,
                                                        new_pwd: edit_new_pwd,
                                                        confirm_pwd: edit_crm_pwd
                                                    },
                                                    success: function(response) {
                                                        alert(response);
                                                    }
                                                });
                                                return false;
                                            });
                                        </script>
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->

        <!-- row start -->

        <!-- row end -->

        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>