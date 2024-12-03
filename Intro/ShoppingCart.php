<?php
session_start();

class ShoppingCart {

    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = []; 
        }
    }

    public function addItem($name, $price, $quantity = 1) {
    
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] == $name) {
                $item['quantity'] += $quantity; 
                return;
            }
        }
        
        $_SESSION['cart'][] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }

    public function removeItem($name, $quantity = 1) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] == $name) {
                if ($item['quantity'] > $quantity) {
                    $item['quantity'] -= $quantity; 
                } else {
                    $_SESSION['cart'] = array_filter($_SESSION['cart'], function($cartItem) use ($name) {
                        return $cartItem['name'] !== $name;
                    });
                }
                return;
            }
        }
    }

    public function listItems() {
        if (empty($_SESSION['cart'])) {
            echo "Your shopping cart is empty.<br>";
            return;
        }

        echo "Shopping Cart:<br>";
        foreach ($_SESSION['cart'] as $item) {
            echo "Item: {$item['name']}, Quantity: {$item['quantity']}, Price: \$" . number_format($item['price'], 2) . " each<br>";
        }
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function checkout() {
        $total = $this->calculateTotal();
        echo "Your total is: \$" . number_format($total, 2) . "<br>";
        $_SESSION['cart'] = []; 
        echo "Checkout complete! Your cart is now empty.<br>";
    }
}
?>
