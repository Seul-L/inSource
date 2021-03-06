<?php

require "sign-in-check.php";

session_start();

if (isset($_SESSION['surname'])) {
    $lastname = $_SESSION['surname'];
}
if (isset($_SESSION['first_name'])) {
    $firstname = $_SESSION['first_name'];
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_SESSION['phone_number'])) {
    $phonenumber = $_SESSION['phone_number'];
}
if (isset($_SESSION['occupation'])) {
    $occupation = $_SESSION['occupation'];
}
if (isset($_SESSION['preferred_communication'])) {
    $preferredcomm = $_SESSION['preferred_communication'];
}
if (isset($_SESSION['password'])) {
    $pass = $_SESSION['password'];
}
if (isset($_SESSION['user_set_password'])) {
    $usersetpass = $_SESSION['user_set_password'];
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="inSource is a solution for bridging the communication gap between front-line workers and management by providing a platform to gather workplace issues and a tested Sprint process for rapidly developing solutions.">
    <meta name="author" content="Seul, Jessica, Dhara, Jeff, Seyitan">
    <title>inSource</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="/css/myAccountStyle.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

    <!-- font awesome -->
    <script src="https://use.fontawesome.com/e5bc08cd73.js"></script>

    <!-- jqery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.3/jquery.min.js"></script>
</head>
<body>




<div class="my-account">
    <div class="txtfield">
        <h2>My Account</h2>
        <form method="POST" action="/php/connectivity.php">

            <div class="fieldBlockTop">
                <label for="last-name">Last Name</label>
                <input type="text" name="ma-last-name" size="40" value="<?php echo($lastname); ?>" id="last-name"
                       class="fieldBlock" disabled="disabled">
            </div>

            <div class="fieldBlockTop">
                <label for="first-name">First Name</label>
                <input type="text" name="ma-first-name" size="40" value="<?php echo($firstname); ?>" id="first-name"
                       class="fieldBlock" disabled="disabled">
            </div>

            <div class="fieldBlockTop">
                <label for="user-name">User Name</label>
                <input type="text" name="ma-user-name" size="40" value="<?php echo($username); ?>" id="user-name"
                       class="fieldBlock" disabled="disabled">
            </div>
            <br>

            <div class="fieldBlockTop lg">
                <label for="user-email">Email</label>
                <input type="text" name="ma-email" size="80" value="<?php echo($email); ?>" id="user-email"
                       class="fieldBlocklg" disabled="disabled">
            </div>


            <div class="fieldBlockTop">
                <label for="user-phone-number">Cell Phone Number</label>
                <input type="tel" name="ma-phone-number" size="40" maxlength="12" placeholder="555-555-5555"
                       value="<?php echo(substr($phonenumber, 0, 3).'-'.substr($phonenumber, 3, 3).'-'.substr($phonenumber, 6)); ?>" id="user-phone-number" class="fieldBlock">
            </div>
    </div>
    <br>

    <?php
    if ($occupation == 0) {
        $transop = "checked";
    } elseif ($occupation == 1) {
        $superv = "checked";
    } elseif ($occupation == 2) {
        $manager = "checked";
    }

    ?>

    <div class="occup">
        <div class="occup-content">
            <h3 class="h3-lb">Occupation</h3>
                <div class="options">
                    <input type="radio" name="ma-occupation" id="transit-operator" class="occ-radio"
                           value="transit operator" <?php echo $transop; ?> disabled>
                    <label for="transit-operator" class="lb-radio">Transit Operator</label>

                    <input type="radio" name="ma-occupation" id="superv" class="occ-radio"
                           value="supervisor" <?php echo $superv; ?> disabled>
                    <label for="superv" class="lb-radio">Supervisor</label>

                    <input type="radio" name="ma-occupation" id="mngt" class="occ-radio"
                           value="management" <?php echo $manager; ?> disabled>
                    <label for="mngt" class="lb-radio">Management</label>
                </div>
        </div>
    </div>
    <br>


    <?php

    if ($preferredcomm == 0) {
        $prefemail = "checked";
    } else if ($preferredcomm == 1) {
        $prefsms = "checked";
    } else if ($preferredcomm == 2) {
        $prefemail = "checked";
        $prefsms = "checked";
    }

    ?>

    <div class="notif">
        <h3 class="h3-ck">Prefered Method of Notification*</h3>
        <div class="communication-method">

            <input type="checkbox" name="comm-method[]" id="chk-email" value="email" <?php echo $prefemail; ?>>
                <label for="chk-email" class="checkbox-label">Email</label>

            <input type="checkbox" name="comm-method[]" id="chk-sms" value="sms" <?php echo $prefsms; ?>>
                <label for="chk-sms" class="checkbox-label">SMS Message</label>
        </div>

    </div>

    <div class="buttons">
        <input id="save-button" type="submit" name="ma-submit" value="Save Changes" class="ma-submit-btn">
        <input id="reset-button" type="submit" name="ma-reset" value="Reset" class="ma-reset-btn">
    </div>
    </form>
</div>


    <div class="chng-pw">
        <h2>Change Password</h2>
        <p class="red">Password must be at least 8 characters long</p>

        <div class="txtform-elements">
            <form method="POST" action="/php/connectivity.php">
                <div class="fieldBlockTop">
                    <label for="curr-pw">Current Password</label>
                    <input type="password" name="current-password" size="40" id="curr-pw" class="fieldBlock" required="">
                </div>

                <div class="fieldBlockTop">
                    <label for="new-pw">New Password</label>
                    <input type="password" name="new-password" size="40" id="new-pw" class="fieldBlock" required="">
                </div>

                <div class="fieldBlockTop">
                    <label for="rpt-new-pw">Repeat New Password</label>
                    <input type="password" name="repeat-new-password" size="40" id="rpt-new-pw" class="fieldBlock" required="">
                </div>

                <div class="buttons">
                    <input id="save-button" type="submit" name="pass-reset-submit" value="Save Changes"
                           class="ma-submit-btn topmargin">
                    <input id="reset-button" type="submit" name="pass-reset-cancel" value="Reset"
                           class="ma-reset-btn topmargin">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
