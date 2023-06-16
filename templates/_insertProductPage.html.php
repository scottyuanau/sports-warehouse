<h2>Add a new product</h2>

<?php include "_formErrorSummary.html.php" ?>

<form action="insertProduct.php" method="post" enctype="multipart/form-data" novalidate>
  <fieldset>

    <div class="form-row">
      <label for="itemName">Product Name:</label>
      <input type="text" name="itemName" id="itemName" value="<?= setValue("itemName") ?>" required>
    </div>

    <div class="form-row">
      <label for="featured">Featured Product: </label>
      <input type="checkbox" name="featured" id="featured" value="<?= setSelected('featured', false) ?>" required>
    </div>

    <div class="form-row">
      <label for="price">Price:</label>
      <input type="number" name="price" id="price" min="0" step="0.01" value="<?= setValue("price") ?>" required>
    </div>

    <div class="form-row">
      <label for="salePrice">Sale Price:</label>
      <input type="number" name="salePrice" id="salePrice" min="0" step="0.01" value="<?= setValue("salePrice") ?>">
    </div>

    <!-- <div class="form-row">
      <label for="categoryId">Category ID:</label>
      <input type="number" name="categoryId" id="categoryId" value="<?= setValue("categoryId") ?>">
    </div> -->

    <div class="form-row">
      <label for="category">Category:</label>
      <select id="category" name="category">
        <?php foreach ($categories as $category) : ?>
          <option value="<?= $category["categoryId"] ?>"><?= $category["categoryName"] ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-row">
      <label for="photoPath">Product Photo:</label>
      <input type="file" name="photoPath" id="photoPath">
    </div>

    <div class="form-row">
      <label for="description">Product Description:</label>
      <textarea name="description" id="description" cols="30" rows="4"><?= setValue("description") ?></textarea>
    </div>

    <div class="form-row">
      <button type="submit" name="submitInsertProduct">Add product</button>
    </div>
  </fieldset>
</form>