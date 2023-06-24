<?php if (!empty($successes)): ?>

<div class="success-summary">
  <p>Success</p>
  <ul>
    <?php foreach ($successes as $success): ?>
      <li><?= $success ?></li>
    <?php endforeach ?>
  </ul>
</div>

<?php endif ?>