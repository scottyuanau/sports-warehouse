<?php

require_once "./classes/ProductClass.php";

try {
$product = new Product();
$product->getProduct(11);
// print_r($product);
// echo $product->getProductName();


} catch (Exception $error) {
    echo $error->getMessage();
}


?>
