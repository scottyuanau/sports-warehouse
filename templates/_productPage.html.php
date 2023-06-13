<div class="product">
    <div class="product__img">
        <?php $file_path = "./img/" . $product["photo"] ?>
        <?php if (file_exists($file_path)) : ?>
            <img src="./img/<?= $product["photo"] ?? "" ?>">
        <?php else : ?>
            <img src="https://fakeimg.pl/350x350/?text=Insert%20Photo">
        <?php endif ?>
    </div>
    <div class="product__details">
        <h1><?= $product['itemName'] ?? "NONE" ?></h1>
        <div class="price">
            <?php if ($product["salePrice"] != 0 && $product["salePrice"] !== null) : ?>
                <span class='price__sale'><?= sprintf('$%1.2f', $product['salePrice'] ?? "--") ?></span>
                <span class='price__original'><?= sprintf('$%1.2f', $product['price'] ?? "--") ?></span>
            <?php endif ?>
            <?php if ($product["salePrice"] == 0 || $product["salePrice"] === null) : ?>
                <span class='price__nodiscount'><?= sprintf('$%1.2f', $product['price'] ?? "--") ?></span>
            <?php endif ?>
        </div>
        <div class="product__description">
            <?= $product['description'] ?? "--" ?>
        </div>
    </div>
</div>