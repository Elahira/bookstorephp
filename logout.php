<?php
session_start();
unset( $_SESSION[ 'customer' ] );
unset( $_SESSION[ 'cart' ] );
header('location: index.php');
?>