<?php
session_start();

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = array();
}

// checking if the item is in the array, if it is, do not add
if(array_key_exists($id, $_SESSION['cart_items'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: products.php?action=exists&id' . $id . '&name=' . $name);
}

// else, add the item to the array
else{
    $_SESSION['cart_items'][$id]=$name;

    // go back to product list and tell the user it was added to cart
    header('Location: products.php?action=added&id' . $id . '&name=' . $name);
}
?>
