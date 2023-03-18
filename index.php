<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="css/index.css" />
    <title>Sports Warehouse</title>
</head>

<body>
    <div class="sitenav">
        <nav class="sitenav-items">
            <i class="fa-solid fa-bars sitenav-items_icon" id="mobilenav"></i>
            <ul class="sitenav-items_ul">
                <li class="sitenav-items_li login"><img src="/img/login.png" alt="login" class="login-image"><span>Login</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>Home</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>About SW</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>Contact Us</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>View Products</span></li>
            </ul>
        </nav>
        <div class="usercontrol">
            <div class="cart">
                <img src="/img/cart.png" alt="cart">
                <span>View Cart</span>
            </div>
            <div class="cart-items">
                <span>0 items</span>
            </div>
        </div>
    </div>

    <main>
        <header>
            <img src='img/logo.png' alt='logo' class='logo'>
            <div class='searchbar'>
                <input type='text' placeholder="Search products" class="searchbar-input" />
                <div class="searchbar-icon">
                    <i class="fa-solid fa-magnifying-glass searchbar-icon_inside"></i>
                </div>
            </div>
        </header>
        <nav class="headernav">
            <ul class='headernav-ul'>
                <li class="headernav-li"><span>Shoes</span><span class="heardernav-li_arrow">></span></li>
                <li class="headernav-li"><span>Helmets</span><span class="heardernav-li_arrow">></span></li>
                <li class="headernav-li"><span>Pants</span><span class="heardernav-li_arrow">></span></li>
                <li class="headernav-li"><span>Tops</span><span class="heardernav-li_arrow">></span></li>
                <li class="headernav-li"><span>Balls</span><span class="heardernav-li_arrow">></span></li>
                <li class="headernav-li"><span>Equipment</span><span class="heardernav-li_arrow">></span></li>
                <li class="headernav-li"><span>Training gear</span><span class="heardernav-li_arrow">></span></li>
            </ul>
        </nav>
        <section class='banner'>
            <img src='/img/banner.png' alt='banner' class='banner-image'>
        </section>
        <section class='featured-products'>
            <h2 class='featured-products-heading'>Featured products</h2>
        </section>
    </main>
    <footer>

    </footer>


    <script src="https://kit.fontawesome.com/b0c79d8457.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>