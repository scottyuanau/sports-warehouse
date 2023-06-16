<h2>Register</h2>

<p>Fill out the registration form if you want...</p>

<?php include "_formErrorSummary.html.php" ?>

<form action="register.php" method="post" novalidate>
  <fieldset>
    <div class="form-row">
      <label for="firstName">First name:</label>
      <input type="text" name="firstName" id="firstName" value="<?= setValue("firstName") ?>" required>
    </div>

    <div class="form-row">
      <label for="lastName">Last name:</label>
      <input type="text" name="lastName" id="lastName" value="<?= setValue("lastName") ?>">
    </div>

    <div class="form-row">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?= setValue("email") ?>">
    </div>

    <div class="form-row">
      <label for="password1">Password:</label>
      <input type="password" name="password1" id="password1" value="<?= setValue("password1") ?>">
    </div>

    <div class="form-row">
      <label for="password2">Re-type password:</label>
      <input type="password" name="password2" id="password2" value="<?= setValue("password2") ?>">
    </div>

    <!-- <div class="form-row">
      <label for="course">Enrolled in:</label>
      <select name="course" id="course">
        <option value="c4-web" <?= setSelected("course", "c4-web") ?>>C4 web</option>
        <option value="dip-web" <?= setSelected("course", "dip-web") ?>>Diploma web</option>
        <option value="c4-programming" <?= setSelected("course", "c4-programming") ?>>C4 programming</option>
      </select>
    </div> -->

    <!-- <div class="form-row">
      <p>Enrolment mode:</p>
      <label>
        <input type="radio" name="enrolmentMode" value="ft" <?= setChecked("enrolmentMode", "ft") ?>>
        Full-time
      </label>
      <label>
        <input type="radio" name="enrolmentMode" value="pt" <?= setChecked("enrolmentMode", "pt") ?>>
        Part-time
      </label>
    </div> -->

    <div class="form-row">
      <input type="checkbox" name="newsletter" id="newsletter" value="yes" <?= setChecked("newsletter", "yes") ?>>
      <label for="newsletter">Signup to newsletter?</label>
    </div>

    <div class="form-row">
      <label for="comments">Any comments?</label>
      <textarea name="comments" id="comments" cols="30" rows="4"><?= setValue("comments") ?></textarea>
    </div>

    <div class="form-row">
      <button type="submit" name="submitRegister">Register</button>
    </div>
  </fieldset>
</form>