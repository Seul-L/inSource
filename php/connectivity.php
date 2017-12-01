<?php
session_start(); //starting session



//connect to mysql
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . $conn->connect_error);
}
/* index.html */
//contact form submission
function contactForm($sqlserver, $contactname, $contactorg, $contactemail, $contactmessage) {
    $contactname = mysqli_real_escape_string($sqlserver, $contactname);
    $contactorg = mysqli_real_escape_string($sqlserver, $contactorg);
    $contactemail = mysqli_real_escape_string($sqlserver, $contactemail);
    $contactmessage = mysqli_real_escape_string($sqlserver, $contactmessage);
    mysqli_query($sqlserver, "INSERT INTO contact_us (name, organization, email, message) VALUES ('$contactname', '$contactorg', '$contactemail', '$contactmessage')");
}

//contact form submit button
if(isset($_POST['contact-form-submit'])) {
    $name = $_POST['cf-name'];
    $org = $_POST['cf-organization'];
    $email = $_POST['cf-email'];
    $message = $_POST['cf-message'];
    contactForm($conn, $name, $org, $email, $message);
    header("Location: /index.html");
}

/* login page */
function signIn($sqlserver, $si_username, $si_password) { //sign in function
    if (!empty($si_username)) { //check username field has value
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
        $row = mysqli_fetch_array($query);
        if ($row['verified'] == 0) {
            $row['password'] = password_hash($row['password'], PASSWORD_DEFAULT);
            $hashedpass = $row['password'];
            mysqli_query($sqlserver, "UPDATE users SET password = '$hashedpass' WHERE username ='$si_username'");
            $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
            $row = mysqli_fetch_array($query);
            if (password_verify($si_password, $row['password'])) {
                $_SESSION = $row;
                $_SESSION['username'] = $row['username'];
                mysqli_query($sqlserver, "UPDATE users SET verified = 1 WHERE username = '$si_username'");
                header("Location: /index.php?page=my-account");
            } else {
                ?>

                <script type="text/javascript">
                    alert('Wrong Username or Password');
                    window.location.href = "/html/sign-in.html";
                </script>

                <?php
            }
        } else {
            if (password_verify($si_password, $row['password'])) {
                $_SESSION = $row;
                $_SESSION['username'] = $row['username'];
                header("Location: /index.php?page=my-account");
            } else {
                ?>

                <script type="text/javascript">
                    alert('Wrong Username or Password');
                    window.location.href = "/html/sign-in.html";
                </script>

                <?php
            }
        }
    } else {
        ?>

        <script type="text/javascript">
            alert('Wrong Username or Password');
            window.location.href = "/html/sign-in.html";
        </script>

        <?php
    }
}

//login button
if (isset($_POST['password-submit'])) { //login page password submission
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    signIn($conn, $username, $password);
}

/* account page */
//password update
function passChange($sqlserver, $si_username, $current_password, $new_password, $rep_new_password)
{
    $current_password = mysqli_real_escape_string($sqlserver, $current_password);
    $new_password = mysqli_real_escape_string($sqlserver, $new_password);
    $rep_new_password = mysqli_real_escape_string($sqlserver, $rep_new_password);

    $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
    $row = mysqli_fetch_array($query);

    if (password_verify($current_password, $row['password'])) {
        if (strlen($rep_new_password) >= 8) {
            if (password_verify($rep_new_password, $new_password)) {
                mysqli_query($sqlserver, "UPDATE users SET password = '$new_password' WHERE username = '$si_username'");
                session_unset();
                $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
                $row = mysqli_fetch_array($query);
                $_SESSION = $row;
                if (password_verify($rep_new_password, $row['password'])) {
                    ?>

                    <script type="text/javascript">
                        alert('Password successfully changed.');
                        window.location.href = "/index.php?page=my-account";
                    </script>

                    <?php

                } else {
                    ?>

                    <script type="text/javascript">
                        alert('Something went wrong.');
                        window.location.href = "/index.php?page=my-account";
                    </script>

                    <?php
                }
            } else {
                ?>

                <script type="text/javascript">
                    alert('Password mismatch');
                    window.location.href = "/index.php?page=my-account";
                </script>

                <?php
            }
        } else {
            ?>

            <script type="text/javascript">
                alert('Password must be 8 characters long.');
                window.location.href = "/index.php?page=my-account";
            </script>

            <?php
        }
    } else {
        ?>

        <script type="text/javascript">
            alert('Password mismatch');
            window.location.href = "/index.php?page=my-account";
        </script>

        <?php
    }
    ?>

    <script type="text/javascript">
        alert('Password successfully changed.');
        window.location.href = "/index.php?page=my-account";
    </script>

    <?php
}

//account info update
function infoChange($sqlserver, $si_username, $ph_number, $comm_method){
    $ph_number = mysqli_real_escape_string($sqlserver, $ph_number);

    $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
    $row = mysqli_fetch_array($query);

    if ($row['phone_number'] != $ph_number) { //update phone number
        $ph_number = preg_replace("/[^0-9]/", "", $ph_number);
        mysqli_query($sqlserver, "UPDATE users SET phone_number = '$ph_number' WHERE username = '$si_username'");
    }

    if ($row['preferred_communication'] != $comm_method) {
        mysqli_query($sqlserver, "UPDATE users SET preferred_communication = $comm_method WHERE username = '$si_username'");
    }

    session_unset();
    $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
    $row = mysqli_fetch_array($query);
    $_SESSION = $row;

    header("Location: /index.php?page=my-account");
}


function commFind($contactForm, $ph_number) {
    if (strlen($ph_number) >= 10) {
        if (!is_null($contactForm)) {
            if (in_array("email", $contactForm)) {
                if (in_array("sms", $contactForm)) {
                    return 2;
                } else {
                    return 0;
                }
            } elseif (in_array("sms", $contactForm)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    } elseif (!is_null($contactForm)) {
        if (in_array("email", $contactForm)) {
            if (in_array("sms", $contactForm)) {
                return 0;
            }
        } elseif (in_array("sms", $contactForm)) {
            return 0;
        }
    } else {
        return 0;
    }
}

//reset buttons
function myAccountReset() {
    header("LOCATION: /index.php?page=my-account");
}

//account page buttons
if (isset($_POST['pass-reset-submit'])) { //password change
    passChange($conn, $_SESSION['username'], $_POST['current-password'], password_hash($_POST['new-password'], PASSWORD_DEFAULT), $_POST['repeat-new-password']);
} elseif (isset($_POST['pass-reset-cancel'])) { //password change cancel
    myAccountReset();
} elseif (isset($_POST['ma-submit'])) { //account info change
    $commType = commFind($_POST['comm-method'], $_POST['ma-phone-number']);
    infoChange($conn, $_SESSION['username'], $_POST['ma-phone-number'], $commType);
} elseif (isset($_POST['ma-reset'])) { //account info change cancel
    myAccountReset();
}



mysqli_close($conn);
?>
