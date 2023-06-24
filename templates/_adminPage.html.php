<h2>Manage Products</h2>
<a href="./insertProduct.php">
<button>Add Product</button></a>

<div class="container-manageProducts">
<?php foreach($productList as $product):?>
   <form action="admin.php" method="post" class="admin_manageProducts">
           <label for="itemName">Product Name</label> <textarea name="itemName" rows="1"><?= $product["itemName"]?></textarea>
           <label for="price">Price</label> <input name="price" value=<?= $product["price"]?>>
           <label for="salePrice">Sale Price</label> <input name="salePrice" value=<?= $product["salePrice"]?>>
           <label for="photo">Photo</label> <input name="photo" value=<?= $product["photo"]?>>
           <label for="categoryId">Category Id</label> 
           <select id="category" name="categoryId">
          <?php foreach ($categoryList as $category) : ?>
            <option value="<?= $category["categoryId"] ?>" <?= $category["categoryId"] === $product["categoryId"]? "Selected" : ""?>><?= $category["categoryName"] ?></option>
          <?php endforeach ?>
        </select>
           <label for="featured">Featured</label> <input name="featured" value=<?= $product["featured"]?>>
           <label for="description">Description</label> <textarea name="description" rows="5"><?= $product["description"]?></textarea>
           <input type="hidden" name="itemId" value=<?= $product["itemId"]?>>
           <div class="button-area">
            <button type="submit" name="submitUpdateProduct">Update</button>
            <button type="submit" name="submitRemoveFromProducts">Remove</button></div>
        </form>
<?php endforeach?>
</div>

<h2>Manage Categories</h2>
<a href="./insertCategory.php">
<button>Add Category</button></a>
<table>
<tr>
    <th>Category ID</th>
    <th>Category Name</th>
</tr>
<?php foreach($categoryList as $category):?>
    <tr>
    <td><?= $category["categoryId"]?></td>
    <td>
        <form action="admin.php" method="post">
            <input type="hidden" name="categoryId" value=<?= $category["categoryId"]?>>
            <input name="newCategoryName" value=<?= $category["categoryName"]?>>
            <button type="submit" name="submitUpdateCategories">Update</button>
        </form></td>
    <td>
        <form action="admin.php" method="post">
            <input type="hidden" name="categoryId" value=<?= $category["categoryId"]?>>
            <button type="submit" name="submitRemoveFromCategories">Remove</button>
        </form></td>
</tr>
<?php endforeach?>
</table>