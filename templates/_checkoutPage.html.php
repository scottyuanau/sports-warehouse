<h1>
    Checkout
</h1>
<?php include "_formErrorSummary.html.php" ?>
<div class="checkout-wrapper">
<form action="checkout.php" method="post" class="checkout-form">
    <h2>Shipping Address</h2>
    <fieldset>
    <label>First Name:</label>
    <input type="text" name="firstName" placeholder="First Name" value="<?= setValue("firstName") ?>" required>
    <label>Last Name:</label>
    <input type="text" name="lastName" placeholder="Last Name" value="<?= setValue("lastName") ?>" required>
    <label>Delivery Address:</label>
    <input type="text" name="deliveryAddress" placeholder="Address" value="<?= setValue("deliveryAddress") ?>" required>
    <label>Contact Number:</label>
    <input type="text" name="contactNumber" placeholder="Phone (optional)" value="<?= setValue("contactNumber") ?>">
    <label>Email:</label>
    <input type="email" name="email" placeholder="Email" value="<?= setValue("email") ?>" required>
    </fieldset>
    <h2>Payment Details</h2>
    <fieldset>
    <label>Credit Card Number:</label>
    <input type="text" name="creditCardNumber" value="<?= setValue("creditCardNumber") ?>" required>
    <label>Expiry Date:</label>
    <input type="date" name="expiryDate" value="<?= setValue("expiryDate") ?>" required>
    <label>Name on Credit Card:</label>
    <input type="text" name="nameOnCreditCard" value="<?= setValue("nameOnCreditCard") ?>">
    <label>CSV:</label>
    <input type="text" name="cSV" value="<?= setValue("cSV") ?>" required>
    </fieldset>
    <input type="hidden" name="subTotal" value=<?=$cart->calculateTotal()?>>
    <button type="submit" name="buyNow">Buy Now</button>
</form>


<div class="order-details">
    <h2>Order Details</h2>

<?php foreach ($cart->getItems() as $item): ?>
<div class="order-details_row">
    <div class="order-details_itemname"><?= $item->getItemName()?></div>
    <div class="order-details_quantity"><?= $item->getQuantity()?></div>
    <div class="order-details_price"><?= sprintf('$%1.2f', $item->getPrice() ?? "--")?></div>
</div>

<?php endforeach ?>
<div class="amount-calculation">
<div class="subtotal-amount">
        <span class="subtotal-amount_heading font_subtotal">Subtotal</span>
        <span class="subtotal-amount_details font_subtotal">$<?= $cart->calculateTotal()?></span>
    </div>
    <div class="total-amount">
        <span class="total-amount_heading emphasis">Total</span>
        <span class="notes">AUD</span>
        <span class="total-amount_details emphasis">$<?= $cart->calculateTotal()?></span>
    </div>
    <span class="total-amount_tax notes">includes $<?= $cart->calculateTotal()/11?> in taxes</span>
</div>
</div>


    


</div>