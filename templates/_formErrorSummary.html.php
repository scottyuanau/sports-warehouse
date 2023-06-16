<?php if (!empty($errors)): ?>

<div class="error-summary">
  <p>Please fix the following errors:</p>
  <ul>
    <?php foreach ($errors as $error): ?>
      <li><?= $error ?></li>
    <?php endforeach ?>
  </ul>
</div>

<?php endif ?>