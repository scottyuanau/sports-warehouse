<h2>Add a new category</h2>

<?php include "_formErrorSummary.html.php" ?>

<form action="insertCategory.php" method="post" novalidate>
  <fieldset>
    <div class="form-row">
      <label for="categoryName">Name:</label>
      <input type="text" name="categoryName" id="categoryName" required>
    </div>

    <div class="form-row">
      <label for="description">Description:</label>
      <textarea name="description" id="description" cols="30" rows="4"></textarea>
    </div>

    <div class="form-row">
      <button type="submit" name="submitInsertCategory">Add</button>
    </div>
  </fieldset>
</form>