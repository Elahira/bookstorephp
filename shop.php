<?php require_once('inc/top.php') ?>
<!-- Site title -->
<title>BookStore</title>

<?php

$pages = 0;
$limit = 16;

if (isset($_GET['page'])) {
    $pages = $_GET['page'];
} else {
    $pages = 1;
}
$start = ($pages - 1) * $limit;

$queryshop = "SELECT * FROM sanpham
LIMIT $start, $limit";

$querypage = "SELECT * FROM sanpham
ORDER BY Idsp asc";

$run_page = $conn->query($querypage);
$num_row_page = $run_page->num_rows;
$total_pages = ceil($num_row_page / $limit);

$runshop = $conn->query($queryshop);
?>

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
                                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- row start -->
        <!-- page wrapper start -->
        <div class="page-main-wrapper">
            <div class="container">
                <div class="row">
                    <!-- sidebar start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                            <!-- sidebar categorie start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-category">
                                    <ul>
                                        <li class="title"><i class="fa fa-bars"></i> Danh mục sản phẩm</li>
                                        <?php
                                        $query = "SELECT * FROM phanloai";
                                        $run = $conn->query($query);
                                        if ($run->num_rows > 0) {
                                            while ($row = $run->fetch_array()) {
                                                $idpl = $row['Idpl'];
                                                $tenpl = $row['Tenphanloai'];
                                        ?>
                                                <li><a href="shop.php?subcat=<?php echo $idpl ?>"><?php echo $tenpl ?></a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- sidebar categorie start -->

                            <!-- manufacturer start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Thương hiệu</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul>
                                        <?php
                                        $querypub = "SELECT * FROM nhaphathanh";
                                        $runpub = $conn->query($querypub);
                                        if($runpub->num_rows > 0){
                                            while($rowpub = $runpub->fetch_array()){
                                                $idnph = $rowpub['Idnph'];
                                                $tennph = $rowpub['Tennph'];
                                                ?>
                                                <li><i class="fa fa-angle-right"></i><a href="shop.php?pub=<?php echo $idnph ?>"><?php echo $tennph ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div>
                            </div>
                            <!-- manufacturer end -->

                            <!-- pricing filter start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Lọc theo giá tiền</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="0" data-max="1000"></div>
                                        <div class="range-slider">
                                            <form action="#" class="d-flex justify-content-between">
                                                <button class="filter-btn">Lọc</button>
                                                <div class="price-input d-flex align-items-center">
                                                    <label for="amount">Giá: </label>
                                                    <input type="text" id="amount">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pricing filter end -->

                        </div>
                    </div>
                    <!-- sidebar end -->

                    <!-- product main wrap start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-banner img-full">
                            <img src="assets/img/banner/banner_ln3.png" alt="">
                        </div>
                        <!-- product view wrapper area start -->
                        <div class="shop-product-wrapper pt-34">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode mr-70 mr-sm-0">
                                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item start -->
                            <div class="shop-product-wrap grid row">
                                <?php
                                if ($runshop->num_rows > 0) {
                                    while ($row = $runshop->fetch_array()) {
                                        $idsp = $row['Idsp'];
                                        $tensp = $row['Tensp'];
                                        $giasp = $row['Giasp'];
                                        $giamgia = $row['Giamgia'];
                                        $giamoi = $row['Giamoi'];
                                        $img = $row['Img'];
                                ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <!-- product single grid item start -->
                                            <div class="product-item fix mb-30">
                                                <div class="product-thumb">
                                                    <a href="product.php?id=<?php echo $idsp ?>">
                                                        <img src="admin/product-img/<?php echo $img ?>" class="img-pri" alt="">
                                                    </a>
                                                    <div class="product-label">
                                                        <span><?php echo $giamgia ?>%</span>
                                                    </div>
                                                    <div class="product-action-link">
                                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h4><a href="product.php?id=<?php echo $idsp ?>"><?php echo $tensp ?></a></h4>
                                                    <div class="pricebox">
                                                        <p style="text-decoration: line-through;">$<?php echo $giasp ?></p>
                                                        <span class="regular-price">$<?php echo $giamoi ?></span>
                                                        <div class="ratings">
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                            <div class="pro-review">
                                                                <span>1 review(s)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product single grid item end -->
                                        </div> <!-- product single column end -->
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <!-- product item end -->
                        </div>
                        <!-- product view wrapper area end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-box">
                                        <?php
                                        if ($pages > 1) {
                                            $previous = $pages - 1;
                                        ?>
                                            <li><a href="shop.php?page=<?php echo $previous ?>">Previous</a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li><a class="Previous">Previous</a></li>
                                        <?php
                                        }
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            $active_class = "";
                                            if ($i == $pages) {
                                                $active_class = "active";
                                            }
                                        ?>
                                            <li class="<?php echo $active_class ?>"><a href="shop.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($pages < $total_pages) {
                                            $pages++; {
                                        ?>
                                                <li><a href="shop.php?page=<?php echo $pages ?>" >Next</a></li>
                            
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <li><a class="Next">Next</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end pagination area -->

                    </div>
                    <!-- product main wrap end -->
                </div>
            </div>
        </div>
        <!-- page wrapper end -->
        <!-- row end -->

        <!-- brand area start -->
        <?php require_once('inc/branded.php') ?>
        <!-- brand area end -->

        <!-- footer area start -->
        <?php require_once('inc/footer.php') ?>