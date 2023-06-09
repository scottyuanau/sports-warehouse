<footer>
    <section class='footer-nav'>
        <h3 class='footer-section-heading'>Site navigation</h3>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About SW</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">View Products</a></li>
            <li><a href="">Privacy Policy</a></li>
        </ul>
    </section>
    <section class='footer-product-category'>
        <h3 class='footer-section-heading'>Product categories</h3>
        <ul>
            <?php foreach ($categories as $category) : ?>
                <li><a href=""><?= $category["categoryName"] ?></a></li>
            <?php endforeach ?>
        </ul>
    </section>
    <section class='footer-contact'>
        <h3 class='footer-section-heading'>Contact Sports Warehouse</h3>
        <div class='contact-card-wrap'>
            <div class='contact-card'>
                <div class='contact-logo'>
                    <a href=""><img src="./img/facebook_icon.png" alt="facebook" class='footer-logo-img'></a>
                </div>
                <p class='footer-logo-title'><a href="">Facebook</a></p>
            </div>
            <div class='contact-card'>
                <div class='contact-logo'>
                    <a href=""><img src="./img/twitter_icon.png" alt=" twitter" class='footer-logo-img'></a>
                </div>
                <p class='footer-logo-title'><a href="">Twitter</a></p>
            </div>
            <div class='contact-card'>
                <div class='contact-logo'>
                    <a href=""><img src="./img/other_icon.png" alt="other" class='footer-logo-img'></a>
                </div>
                <p class='footer-logo-title'><a href="">Other</a></p>
            </div>

        </div>
    </section>
    <div class='footer-disclaimer'>
        <p>© Copyright 2020 Sports Warehouse. All rights reserved. Website made by Awesomesauce Design.</p>
    </div>
</footer>


<script src="https://kit.fontawesome.com/b0c79d8457.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="js/index.js"></script>