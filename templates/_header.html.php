<div class="header-wrapper">
    <header>
        <a href="index.php" class="logo__link"><img src='img/logo.png' alt='site-logo' class='logo'></a>
        <form class='searchbar' action="search.php" method="get">
            <label for="searchbox"></label>
            <input id='searchbox' type='search' name="search" placeholder="Search products" class="searchbar-input" role="searchbox">

            <button class="searchbar-icon" type="submit" aria-label="Product search">
                <i class="fa-solid fa-magnifying-glass searchbar-icon_inside" role="button"></i>
            </button>
        </form>
    </header>
    <nav class="headernav">
        <ul class='headernav-ul'>

            <?php foreach ($categories as $category) : ?>
                <li class="headernav-li"><a href="category.php?id=<?= $category['categoryId'] ?>"><?= $category["categoryName"] ?></a><span class="heardernav-li_arrow">></span></li>
            <?php endforeach ?>

        </ul>
    </nav>
</div>