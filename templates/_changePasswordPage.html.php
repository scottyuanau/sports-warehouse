

<div class="changepassword-wrapper">
    <h2>Change Password</h2>
<?php include "_formErrorSummary.html.php" ?>
<?php include "_formSuccessSummary.html.php" ?>
<form action="changePassword.php" method="post">
<label>Username: </label>
<input type="text" name="username">
<label>Current Password:</label>
<input type="password" name="currentPassword">
<label>New Password:</label>
<input type="password" name="newPassword">
<button type="submit" name="submitChangePassword">Update Password</button>
</form>
</div>