<h1>Shopping Cart</h1>
<?php include "_formErrorSummary.html.php" ?>

<div class="cart-wrapper">
<div class="order-items">
<div class="order-items_row">
    <span>Item</span>
    <span>Qty</span>
    <span>Amount</span>
    <span>Action</span>
</div>
<?php foreach ($cart->getItems() as $item): ?>

<div class="order-items_row">
<span><?= $item->getItemName()?></span>
<span><?= $item->getQuantity()?></span>
<span><?= sprintf('$%1.2f', $item->getPrice() ?? "--")?></span>
<form action="cart.php" method="post">
        <input type="hidden" name="itemId" value=<?= $item->getItemId();?>>
        <button type="submit" name="submitRemoveFromCart">Remove</button>
    </form>
</div>

<?php endforeach ?>
</div>

<div class="order-amount-summary">
    <h2>Summary</h2>

    <div class="order-amount-summary_row">
        <span>Subtotal</span>
        <span>$<?= number_format($cart->calculateTotal()/11*10, 2)?></span>
    </div>
    <div class="order-amount-summary_row">
        <span>GST</span>
        <span>$<?= number_format($cart->calculateTotal()/11,2)?></span>
    </div>
    <div class="order-amount-summary_row">
        <span class="emphasis">Order Total</span>
        <span class="emphasis">$<?= $cart->calculateTotal()?></span>
    </div>

    <div class="checkout-button"><button onclick="window.location.href='./checkout.php';">Checkout</button>
</div>
</div>

</div>



