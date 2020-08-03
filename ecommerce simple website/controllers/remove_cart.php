<?php
session_start();

unset($_SESSION['cart'][$_GET['id']]);
$_SESSION['cart-count'] = count($_SESSION['cart']);

if($_SESSION['cart-count'] == 0){
	unset($_SESSION['cart']);
}
header("Location: {$_SERVER['HTTP_REFERER']}");