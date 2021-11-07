<?php

require_once "Cart/Product.php";
require_once "Cart/Cart.php";
require_once "Cart/CartItem.php";

use cart\Cart as Kosar;
use cart\Product as Termek;

$product1 = new Termek(1, "iPhone 11", 2500, 10);
$product2 = new Termek(2, "M2 SSD", 400, 10);
$product3 = new Termek(3, "Samsung Galaxy S20", 3200, 10);
$cart = new Kosar();
$cartItem1 = $cart->addProduct($product1, 1);
$cartItem2 = $product2->addToCart($cart, 1);



echo "Number of items in cart: ".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL; // This must print 2
echo "Total price of items in cart: ".PHP_EOL;
echo $cart->getTotalSum().PHP_EOL; // This must print 2900

$cartItem2->increaseQuantity();
$cartItem2->increaseQuantity();

echo "Number of items in cart: ".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL; // This must print 4

echo "Total price of items in cart: ".PHP_EOL;
echo $cart->getTotalSum().PHP_EOL; // This must print 3700

//$cart->removeProduct($product1);

echo "Number of items in cart: ".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL; // This must print 4

echo "Total price of items in cart: ".PHP_EOL;
echo $cart->getTotalSum().PHP_EOL; // This must print 3700
