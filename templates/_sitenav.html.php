<div class="sitenav">
    <nav class="sitenav-items">
        <div id='mobilenav'>
            <!-- mobile nav hamburger -->
            <div class="hamburger sitenav-items_icon" id="navbutton-icon">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>

            <span id='navbutton-description'>Menu</span>
        </div>
        <ul class="sitenav-items_ul">
            <li class="sitenav-items_li login"><i class="fa-solid fa-lock"></i><a href="./login.php"><?=isset($_SESSION['username']) ? 'Hi '.$_SESSION['username'] :'Login'?></a></li>
            <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><a href="index.php">Home</a></li>
            <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><a href="">About SW</a></li>
            <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><a href="contactus.php">Contact Us</a></li>
            <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><a href="">View Products</a></li>
            <?php if(isset($_SESSION['user'])):?>
            <li class="sitenav-items_li"><i class="fa-regular fa-circle sitenav-items_circle"></i><a href="./logout.php">Logout</a></li>
            <?php endif?>
        </ul>
    </nav>
    <div class="usercontrol">
        <div class="cart">
            <i class="fa-solid fa-cart-shopping"></i>
            <a href="./cart.php">View Cart</a>
        </div>
        <div class="cart-items">
            <a href=""><?= $_SESSION["cartItem"] ?? 0 ?> items</a>
        </div>
        <?php if(isset($_SESSION['user']) && $_SESSION['username'] ==='admin'): ?>
        <div class="admin">
            <a href="./admin.php">Admin</a>
        </div> 
        <?php endif ?>
    </div>
</div>