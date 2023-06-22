<?php
// local variables to avoid multiple calls
$productName = $product->getProductName();
$price = $product->getUnitPrice();
$salePrice = $product->getSalePrice();
$photo = $product->getPhoto();
$description = $product->getDescription();
?>

<div class="product">
    <div class="product__img">
        <?php $file_path = "./img/" . $photo ?>
        <?php if (file_exists($file_path)) : ?>
            <img src="./img/<?= $photo ?? "" ?>">
        <?php else : ?>
            <img src="https://fakeimg.pl/350x350/?text=Insert%20Photo">
        <?php endif ?>
    </div>
    <div class="product__details">
        <h1><?= $productName ?? "NONE" ?></h1>
        <div class="price">
            <?php if ($price != 0 && $salePrice !== null) : ?>
                <span class='price__sale'><?= sprintf('$%1.2f', $salePrice ?? "--") ?></span>
                <span class='price__original'><?= sprintf('$%1.2f', $price ?? "--") ?></span>
            <?php endif ?>
            <?php if ($price == 0 || $salePrice === null) : ?>
                <span class='price__nodiscount'><?= sprintf('$%1.2f', $price ?? "--") ?></span>
            <?php endif ?>
        </div>
        <div class="product__description">
            <?= $description ?? "--" ?>
        </div>
    </div>
</div>