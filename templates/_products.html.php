<?php if (empty($products)) : ?>

    <p>No products.</p>

<?php else : ?>

    <ul class="product-list">

        <?php foreach ($products as $product) : ?>

            <li class="product">
                <a href="product.php?id=<?= $product["itemId"] ?>" class="product__link">
                    <h3 class="product__name"><?= $product["itemName"] ?></h3>
                    <p class="product__price"><?= sprintf('$%1.2f', $product["price"]) ?></p>
                </a>
            </li>

        <?php endforeach ?>

    </ul>

<?php endif ?>