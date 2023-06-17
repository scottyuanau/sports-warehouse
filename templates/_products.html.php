<?php if (empty($products)) : ?>

    <p>No products.</p>

<?php else : ?>

    <div class="product-list">

        <?php foreach ($products as $product) : ?>

            <div class="product__category">
                <a href="product.php?id=<?= $product["itemId"] ?>" class="product__link">
                    <?php $file_path = "./img/" . $product["photo"] ?>
                    <?php if (file_exists($file_path)) : ?>
                        <img src="./img/<?= $product["photo"] ?? "" ?>" class="product__category__thumbnail">
                    <?php else : ?>
                        <img src="https://fakeimg.pl/100x100/?text=Insert%20Photo">
                    <?php endif ?>
                    <h3 class="product__name"><?= $product["itemName"] ?></h3>
                    <p class="product__price"><?= sprintf('$%1.2f', $product["price"]) ?></p>
                </a>
            </div>

        <?php endforeach ?>

    </div>

<?php endif ?>