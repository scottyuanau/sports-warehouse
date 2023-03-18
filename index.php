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
            <div id='mobilenav'>
                <i class="fa-solid fa-bars sitenav-items_icon" id='navbutton-icon'></i>
                <span id='navbutton-description'>Menu</span>
            </div>
            <ul class="sitenav-items_ul">
                <li class="sitenav-items_li login"><i class="fa-solid fa-lock"></i><span>Login</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>Home</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>About SW</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>Contact Us</span></li>
                <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><span>View Products</span></li>
            </ul>
        </nav>
        <div class="usercontrol">
            <div class="cart">
                <i class="fa-solid fa-cart-shopping"></i>
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
            <div class='banner-callout'>
                <p class='banner-callout-description'>View our brand new range of</p>
                <h2 class='banner-callout-title'>Sports Balls</h2>
                <button class='banner-callout-button'>Shop now</button>
            </div>
            <img src='/img/banner.png' alt='banner' class='banner-image'>
        </section>
        <section class='featured-products'>
            <h2 class='section-heading'>Featured products</h2>
            <div class='featured-products-gallery'>
                <div class="featured-products-card">
                    <div class='featured-products-img-wrap'>
                        <img src="/img/product-adidas-euro16.png" alt="adidas-euro16" class='featured-products-img'>
                    </div>
                    <div class='price'>
                        <span class='price-discount'>$34.95</span>
                        <span class='price-original'>$46.00</span>
                    </div>
                    <div class='featured-products-title'>adidas Euro16 Top Soccer Ball</div>
                </div>
                <div class="featured-products-card">
                    <div class='featured-products-img-wrap'>
                        <img src="/img/product-pro-tec-classic-skate-helmet.png" alt="pro-tec-classic-skate-helmet" class='featured-products-img'>
                    </div>
                    <div class='price'>
                        <span class='price-current'>$70.00</span>
                    </div>
                    <div class='featured-products-title'>Pro-tec Classic Skate Helmet</div>
                </div>
                <div class="featured-products-card">
                    <div class='featured-products-img-wrap'>
                        <img src="/img/product-nike-sport.png" alt="nike-sport-600ml-water-bottle" class='featured-products-img'>
                    </div>
                    <div class='price'>
                        <span class='price-discount'>$15.00</span>
                        <span class='price-original'>$17.50</span>
                    </div>
                    <div class='featured-products-title'>Nike Sport 600ml Water Bottle</div>
                </div>
                <div class="featured-products-card">
                    <div class='featured-products-img-wrap'>
                        <img src="/img/product-sting-armaplus.png" alt="sting armaplus boxing gloves" class='featured-products-img'>
                    </div>
                    <div class='price'>
                        <span class='price-current'>$79.95</span>
                    </div>
                    <div class='featured-products-title'>Sting ArmaPlus Boxing Gloves</div>
                </div>
                <div class="featured-products-card">
                    <div class='featured-products-img-wrap'>
                        <img src="/img/product-ascics-gel-lethal.png" alt="asics gel lethal tigreor 8" class='featured-products-img'>
                    </div>
                    <div class='price'>
                        <span class='price-current'>$160.00</span>

                    </div>
                    <div class='featured-products-title'>Asics Gel Lethal Tigreor 8 IT Men's FG Boots</div>
                </div>

            </div>
        </section>

        <section class='partnership'>
            <h2 class='section-heading'>Our brands and partnerships</h2>
            <div class='partnership-wrap'>
                <div class='partnership-description'>
                    <p>These are some of our top brands and partnerships.</p>
                    <p class='partnership-description_highlight'>The best of the best is here.</p>
                </div>
                <div class="partnership-logos">
                    <img src="img/logo_nike.png" alt="nike" class='partnership-individual-logo'>
                    <img src="img/logo_adidas.png" alt="adidas" class='partnership-individual-logo'>
                    <img src="img/logo_skins.png" alt="skins" class='partnership-individual-logo'>
                    <img src="img/logo_asics.png" alt="asics" class='partnership-individual-logo'>
                    <img src="img/logo_newbalance.png" alt="new balance" class='partnership-individual-logo'>
                    <img src="img/logo_wilson.png" alt="wilson" class='partnership-individual-logo'>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <section class='footer-nav'>
            <h3 class='footer-section-heading'>Site navigation</h3>
            <ul>
                <li>Home</li>
                <li>About SW</li>
                <li>Contact Us</li>
                <li>View Products</li>
                <li>Privacy Policy</li>
            </ul>
        </section>
        <section class='footer-product-category'>
            <h3 class='footer-section-heading'>Product categories</h3>
            <ul>
                <li>Shoes</li>
                <li>Helmets</li>
                <li>Pants</li>
                <li>Tops</li>
                <li>Balls</li>
                <li>Equipment</li>
                <li>Training Gear</li>
            </ul>
        </section>
        <section class='footer-contact'>
            <h3 class='footer-section-heading'>Contact Sports Warehouse</h3>
            <div class='contact-card-wrap'>
                <div class='contact-card'>
                    <div class='contact-logo'>
                        <img src="/img/facebook icon.png" alt="facebook" class='footer-logo-img'>
                    </div>
                    <p class='footer-logo-title'>Facebook</p>
                </div>
                <div class='contact-card'>
                    <div class='contact-logo'>
                        <img src="/img/twitter icon.png" alt=" twitter" class='footer-logo-img'>
                    </div>
                    <p class='footer-logo-title'>Twitter</p>
                </div>
                <div class='contact-card'>
                    <div class='contact-logo'>
                        <img src="/img/other icon.png" alt="other" class='footer-logo-img'>
                    </div>
                    <p class='footer-logo-title'>Other</p>
                </div>

            </div>
        </section>
        <section class='footer-disclaimer'>
            <p>© Copyright 2020 Sports Warehouse. All rights reserved. Website made by Awesomesauce Design.</p>
        </section>
    </footer>


    <script src="https://kit.fontawesome.com/b0c79d8457.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>