<?php

require_once 'ShoppingCart.php';

$cart = new ShoppingCart();

$cart->addItem("Apple", 1.00, 3);  // 3 Apples at $1.00 each
$cart->addItem("Banana", 0.50, 5); // 5 Bananas at $0.50 each
$cart->addItem("Milk", 2.00, 1);   // 1 Milk at $2.00 each

$cart->listItems();

$cart->removeItem("Banana", 2);  

$cart->listItems();

$cart->checkout();

$cart->listItems();
?>
