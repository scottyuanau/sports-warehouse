<div class="product">
    <div class="product__img">
        <?php $file_path = "./img/" . $product->getPhoto() ?>
        <?php if (file_exists($file_path)) : ?>
            <img src="./img/<?= $product->getPhoto() ?? "" ?>">
        <?php else : ?>
            <img src="https://fakeimg.pl/350x350/?text=Insert%20Photo">
        <?php endif ?>
    </div>
    <div class="product__details">
        <h1><?= $product->getProductName() ?? "NONE" ?></h1>
        <div class="price">
            <?php if ($product->getUnitPrice() != 0 && $product->getSalePrice() !== null) : ?>
                <span class='price__sale'><?= sprintf('$%1.2f', $product->getSalePrice() ?? "--") ?></span>
                <span class='price__original'><?= sprintf('$%1.2f', $product->getUnitPrice() ?? "--") ?></span>
            <?php endif ?>
            <?php if ($product->getUnitPrice() == 0 || $product->getSalePrice() === null) : ?>
                <span class='price__nodiscount'><?= sprintf('$%1.2f', $product->getUnitPrice() ?? "--") ?></span>
            <?php endif ?>
        </div>
        <div class="product__description">
            <?= $product->getDescription() ?? "--" ?>
        </div>
    </div>
</div>