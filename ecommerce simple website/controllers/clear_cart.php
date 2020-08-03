<?php

session_start();

unset($_SESSION['cart']);
unset($_SESSION['cart-count']);

header("Location: {$_SERVER['HTTP_REFERER']}");