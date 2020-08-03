<?php 
session_start();
// $_SESSION['cart'] = [
     // key value pair
//    $id => qty,
//    $id => qty,
//    $id => qty,

// ];


// echo "<pre>", var_dump($_GET['id']), "</pre>";
// echo "<pre>", var_dump($_POST['quantity']), "</pre>";
$product_id = $_GET['id'];
$product_quantity = $_POST['quantity'];

// store the product id and product quantity in session
$_SESSION['cart'][$product_id] = $product_quantity;

// count the number of product in cart
$_SESSION['cart-count'] = count($_SESSION['cart']);

// echo "<pre>", var_dump($_SESSION['cart']), "</pre>";

header("Location: ./../views/cart.php");
