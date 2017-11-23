 <!-- Created by PhpStorm.
  User: Jeff
  Date: 2017-11-23
  Time: 10:48 AM -->


<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>My Account</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>

    <body id="myaccount-body-color">


    <?php //get info from mysql
        session_start();

        if(isset($_SESSION['surname'])){
            $lastname = $_SESSION['surname'];
        }
        if(isset($_SESSION['first_name'])){
            $firstname = $_SESSION['first_name'];
        }
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
        }
        if(isset($_SESSION['phone_number'])){
            $phonenumber = $_SESSION['phone_number'];
        }
        if(isset($_SESSION['occupation'])){
            $occupation = $_SESSION['occupation'];
        }
        if(isset($_SESSION['preferred_communication'])){
            $preferredcomm = $_SESSION['preferred_communication'];
        }
        if(isset($_SESSION['password'])){
            $pass = $_SESSION['password'];
        }
        ?>

<div id="My Account">
    <fieldset style="width: 30%"><legend>My Account</legend>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                Last Name <br><input type="text" name="ma-last-name" size="40" value="<?php echo($lastname); ?>" >
            </form>
        </div>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                First Name <br><input type="text" name="ma-first-name" size="40" value="<?php echo($firstname); ?>">
            </form>
        </div>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                User Name <br><input type="text" name="ma-user-name" size="40" value="<?php echo($username); ?>">
            </form>
        </div>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                Email <br><input type="text" name="ma-email" size="80" value="<?php echo($email); ?>">
            </form>
        </div>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                Phone Number <br><input type="text" name="ma-phone-number" size="40" value="<?php echo($phonenumber); ?>">
            </form>
        </div>

        <?php
        if($occupation = 0){
            $transop = "checked";
        } else if($occupation = 1){
            $superv = "checked";
        } else if($occupation = 2){
            $manager = "checked";
        }
        ?>
        <div class="occupation-radios">
            <form method="POST" action="/php/connectivity.php">
                <input type="radio" name="ma-occupation" value="transit operator" <?php echo $transop; ?>>Transit Operator
                <input type="radio" name="ma-occupation" value="supervisor" <?php echo $superv; ?>>Supervisor
                <input type="radio" name="ma-occupation" value="management" <?php echo $manager; ?>>Management
            </form>
        </div>

        <?php
        if($preferredcomm = 0){
            $prefemail = "checked";
        } else if($preferredcomm = 1){
            $prefsms = "checked";
        } else if($preferredcomm = 2){
            $prefboth = "checked";
        }
        ?>

        <div class="communication-method">
            <form method="POST" action="/php/connectivity.php">
                <input type="checkbox" name="comm-method" value="email" <?php echo $prefemail; echo $prefboth ?>>Email
                <input type="checkbox" name="comm-method" value="sms" <?php echo $prefsms; echo $prefboth ?>>Text Message
            </form>
        </div>

        <div class="submit-button">
            <input id="save-button" type="submit" name="ma-submit" value="Save Changes">
        </div>

        <div class="reset-button">
            <input id="reset-button" type="submit" name="ma-reset" value="Reset">
        </div>

    </fieldset>

    <hr>

    <fieldset style="width: 30%"><legend>Change Password</legend>
        <h1>Password must be 8 characters long</h1>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                Current Password <br><input type="password" name="current-password" size="40" value="<?php echo $pass; ?>">
            </form>
        </div>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                New Password <br><input type="password" name="new-password" size="40">
            </form>
        </div>

        <div class="form-elements">
            <form method="POST" action="/php/connectivity.php">
                Repeat New Password <br><input type="password" name="repeat-new-password" size="40">
            </form>
        </div>
        <div class="submit-button">
            <input id="save-button" type="submit" name="pass-reset-submit" value="Save Changes">
        </div>

        <div class="reset-button">
            <input id="reset-button" type="submit" name="pass-reset-cancel" value="Reset">
        </div>
</div>
</body>
</html>


