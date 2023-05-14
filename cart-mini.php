<?php
require_once('inc/db.php');
$id = $_POST['id'];
?>
<?php
    
?>

<div class="mini-cart-btn">
    <i class="fa fa-shopping-cart"></i>
    <span class="cart-notification">2</span>
</div>
<div class="cart-total-price">
    <span>total</span>
    $50.00
</div>
<ul class="cart-list">
    <li>
        <div class="cart-img">
            <a href="product-details.html"><img src="assets/img/cart/cart-1.jpg" alt=""></a>
        </div>
        <div class="cart-info">
            <h4><a href="product-details.html">simple product 09</a></h4>
            <span>$60.00</span>
        </div>
        <div class="del-icon">
            <i class="fa fa-times"></i>
        </div>
    </li>
    <li>
        <div class="cart-img">
            <a href="product-details.html"><img src="assets/img/cart/cart-2.jpg" alt=""></a>
        </div>
        <div class="cart-info">
            <h4><a href="product-details.html">virtual product 10</a></h4>
            <span>$50.00</span>
        </div>
        <div class="del-icon">
            <i class="fa fa-times"></i>
        </div>
    </li>
    <li class="mini-cart-price">
        <span class="subtotal">subtotal : </span>
        <span class="subtotal-price">$88.66</span>
    </li>
    <li class="checkout-btn">
        <a href="cart.php">Xem giỏ hàng</a>
    </li>
</ul>