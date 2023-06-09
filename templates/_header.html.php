<div class="header-wrapper">
    <header>
        <a href="index.php"><img src='img/logo.png' alt='site-logo' class='logo'></a>
        <form class='searchbar'>
            <label for="searchbox">Search</label>
            <input id='searchbox' type='text' placeholder="Search products" class="searchbar-input" role="searchbox">

            <div class="searchbar-icon">
                <i class="fa-solid fa-magnifying-glass searchbar-icon_inside" role="button"></i>
            </div>
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