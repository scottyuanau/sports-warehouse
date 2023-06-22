<?php

require_once "./classes/ProductClass.php";

try {
$product = new Product();
$product->getProduct(1);
echo $product->getProductName();


} catch (Exception $error) {
    echo $error->getMessage();
}


?>
