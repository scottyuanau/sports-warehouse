<h2>Add a new product</h2>

<?php include "_formErrorSummary.html.php" ?>

<form action="insertProduct.php" method="post" enctype="multipart/form-data" novalidate>
  <fieldset>

    <div class="form-row">
      <div class="form-row__left">
        <label for="itemName">Product Name:</label>
      </div>
      <div class="form-row__right">
        <input type="text" name="itemName" id="itemName" value="<?= setValue("itemName") ?>" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-row__left">
        <label for="featured">Featured Product: </label>
      </div>
      <div class="form-row__right">
        <input type="checkbox" name="featured" id="featured" value="<?= setSelected('featured', false) ?>" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-row__left">
        <label for="price">Price:</label>
      </div>
      <div class="form-row__right">
        <input type="number" name="price" id="price" min="0" step="0.01" value="<?= setValue("price") ?>" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-row__left">
        <label for="salePrice">Sale Price:</label>
      </div>
      <div class="form-row__right">
        <input type="number" name="salePrice" id="salePrice" min="0" step="0.01" value="<?= setValue("salePrice") ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="form-row__left">
        <label for="category">Category:</label>
      </div>
      <div class="form-row__right">
        <select id="category" name="category">
          <?php foreach ($categories as $category) : ?>
            <option value="<?= $category["categoryId"] ?>"><?= $category["categoryName"] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-row__left">

      </div>
      <div class="form-row__right">
        <label for="photoPath" class="file-label">Upload Photo</label>
        <input type="file" name="photoPath" id="photoPath" class="file-input">
      </div>
    </div>

    <div class="form-row">
      <div class="form-row__left">
        <label for="description">Product Description:</label>
      </div>
      <div class="form-row__right">
        <textarea name="description" id="description" cols="38" rows="4"><?= setValue("description") ?></textarea>
      </div>
    </div>

    <div class="form-row">
      <button type="submit" name="submitInsertProduct">Add Product</button>
    </div>
  </fieldset>
</form>