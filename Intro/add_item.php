<?php
require_once 'ShoppingCart.php';

$cart = new ShoppingCart();
$cart->addItem("Orange", 1.50, 2); // Add 2 Oranges

// Redirect to cart view page after adding the item
header("Location: view_cart.php");
exit();
