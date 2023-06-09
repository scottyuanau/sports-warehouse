<h2>Product: <?= $product['itemName'] ?? "NONE" ?></h2>

<table class="product-details">
    <tr>
        <th>Price (per unit)</th>
        <td><?= sprintf('$%1.2f', $product['price'] ?? "--") ?></td>
    </tr>
    <tr>
        <th>Sale Price</th>
        <td><?= sprintf('$%1.2f', $product['salePrice'] ?? "--") ?></td>
    </tr>
    <tr>
        <th>photo</th>
        <td><?= $product['photo'] ?? "--" ?></td>
    </tr>
    <tr>
        <th>description</th>
        <td><?= $product['description'] ?? "--" ?></td>
    </tr>
    <tr>
        <th>featured</th>
        <td><?= $product['featured'] ?? "--" ?></td>
    </tr>
</table>