<section class='featured-products'>
    <h2 class='section-heading'>Featured products</h2>
    <div class='featured-products-gallery'>


        <?php foreach ($products as $product) : ?>

            <div class="featured-products-card">
                <div class='featured-products-img-wrap'>
                    <a href="product.php?id=<?= $product["itemId"] ?>"><img src="img/<?php echo $product['photo'] ?>" alt="<?= $product['itemName'] ?>" class='featured-products-img'></a>
                </div>
                <div class='price'>
                    <?php if ($product["salePrice"] != 0 && $product["salePrice"] !== null) : ?>
                        <span class='price-discount'><?= sprintf('$%1.2f', $product['salePrice'] ?? "--") ?></span>
                        <span class='price-original'><?= sprintf('$%1.2f', $product['price'] ?? "--") ?></span>
                    <?php endif ?>
                    <?php if ($product["salePrice"] == 0 || $product["salePrice"] === null) : ?>
                        <span><?= sprintf('$%1.2f', $product['price'] ?? "--") ?></span>
                    <?php endif ?>
                </div>
                <div class='featured-products-title'><?= $product["itemName"] ?></div>
            </div>

        <?php endforeach ?>

    </div>
</section>