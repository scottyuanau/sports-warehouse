<div class="login-wrapper">
<?php include "_formErrorSummary.html.php" ?>
<form action="./login.php" method="post" class="login-form">

<h2>Login</h2>

    <label for="username">Username: </label>
    <input type="text" name="username">
    <label for="password">Password: </label>
    <input type="password" name="password">
    <button type="submit" name="login">Login</button>
    
</form>
<a href="./changePassword.php"><button class="button_changePassword">Change Password</button></a>
</div>
<p>Admin: admin, password; Other: test, 123</p>