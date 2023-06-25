<h2>Shopping Cart</h2>
<?php include "_formErrorSummary.html.php" ?>

<table>
    <tr>
        <th>item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th></th>
    </tr>
<?php foreach ($cart->getItems() as $item): ?>

    <tr>
        <td><?= $item->getItemName()?></td>
        <td><?= sprintf('$%1.2f', $item->getPrice() ?? "--")?></td>
        <td><?= $item->getQuantity()?></td>
        <td>
        <form action="cart.php" method="post">
            <input type="hidden" name="itemId" value=<?= $item->getItemId();?>>
            <button type="submit" name="submitRemoveFromCart">Remove</button>
        </form></td>
    </tr>

<?php endforeach ?>
    <td>Total Amount: $<?= $cart->calculateTotal()?></td>
</table>

<!-- <form action="checkout.php" method="post">
    <?php foreach ($cart->getItems() as $item): ?>
        <input type="hidden" name="<?= "itemName".$item->getItemId();?>" value=<?= $item->getItemId();?>>
        <input type="hidden" name="<?= "price".$item->getItemId();?>" value=<?= $item->getPrice();?>>
        <input type="hidden" name="<?= "quantity".$item->getItemId();?>" value=<?= $item->getQuantity();?>>
    <?php endforeach ?>
        <input type="hidden" name="subtotal" value=<?= $cart->calculateTotal()?>>
    <button type="submit" name="checkout">Checkout</button>
</form> -->

<a href="./checkout.php"><button>Checkout</button></a>