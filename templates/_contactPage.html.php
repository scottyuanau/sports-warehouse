<div class="comingsoon_header">
    <h1>Contact us</h1>
    <p>Sports warehouse is coming soon. If you have any questions, we would love to hear from you, please complete the following information. </p>
</div>
<form action="formhandler.php" method="post" class="contactform">
    <fieldset>
        <div>
            <label for="firstName">First Name*: </label>
            <input id="firstName" name="firstName" type="text" required>
        </div>
        <div> <label for="lastName">Last Name*:</label>
            <input type="text" name="lastName" id="lastName" value="" required>
        </div>
        <div> <label for="contactNumber">Contact Number:</label>
            <input type="number" name="contactNumber" id="contactNumber" value="">
        </div>
        <div> <label for="email">Email*:</label>
            <input type="email" name="email" id="email" value="" required>
        </div>
        <div> <label for="questions">Questions:</label>
            <textarea name="questions" id="questions" rows="4" cols="47"></textarea>
        </div>
        <div> <button type="submit" name="submitButton" id="submitButton">Submit</button> </div>
    </fieldset>
</form>