<?php require_once('inc/top.php') ?>
<!-- Site title -->
<title>Giỏ hàng</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- row start -->
        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                        <th class="pro-title">Sách</th>
                                        <th class="pro-price">Đơn giá</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Thành tiền</th>
                                        <th class="pro-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $subtotal = 0;
                                        $total = 0;
                                        foreach ($_SESSION["cart"] as &$sp) {
                                            $id_sp = $sp['id'];
                                            $name = $sp['name'];
                                            $price = $sp['price'];
                                            $quantity = $sp['quantity'];
                                            $img = $val = $sp['img'];

                                            $subtotal = $price * $quantity;
                                            $total += $subtotal;
                                    ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="product.php?id=<?php echo $id_sp ?>"><img class="img-fluid" src="admin/product-img/<?php echo $img ?>" alt="Product" /></a></td>
                                                <td class="pro-title"><a href="product.php?id=<?php echo $id_sp ?>"><?php echo $name ?></a></td>
                                                <td class="pro-price"><span><?php echo $price ?></span></td>
                                                <td class="pro-quantity">
                                                    <div class="pro-qty"><input type="text" value="<?php echo $quantity ?>"></div>
                                                </td>
                                                <td class="pro-subtotal"><span><?php echo $subtotal ?></span></td>
                                                <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="sqr-btn">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="cart-update mt-sm-16">
                                <a href="#" class="sqr-btn">Update Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h3>Cart Totals</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>$230</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td>$70</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount">$300</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="checkout.html" class="sqr-btn d-block">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
        <!-- row end -->

        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>