<h1>Thank you</h1>
<p>Thank you for registering. Here is the information you submitted:</p>
<dl>
    <dt>First Name:</dt>
    <dd><?php
        if (empty($_POST["firstName"])) {
            $firstName = "Not supplied";
        } else {
            $firstName = $_POST["firstName"];
        }
        print_r($firstName);
        ?></dd>
    <dt>Last Name:</dt>
    <dd>
        <?php
        if (empty($_POST["lastName"])) {
            $lastName = "Not supplied";
        } else {
            $lastName = $_POST["lastName"];
        }
        print_r($lastName);
        ?>
    </dd>
    <dt>Phone Number:</dt>
    <dd><?= $_POST["contactNumber"] ?></dd>
    <dt>Email:</dt>
    <dd>
        <?php
        if (empty($_POST["email"])) {
            $email = "Not supplied";
        } else {
            $email = $_POST["email"];
        }
        print_r($email);
        ?>

    </dd>
    <dt>Questions:</dt>
    <dd><?= $_POST["questions"] ?></dd>
</dl>