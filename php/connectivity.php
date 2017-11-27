<?php
session_start(); //starting session




//connect to mysql
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . $conn->connect_error);
}

/* login page */
function signIn($sqlserver, $si_username, $si_password)
{ //sign in function
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
                $_SESSION['username'] = $row['username'];
                mysqli_query($sqlserver, "UPDATE users SET verified = 1 WHERE username = '$si_username'");
                header("Location: /php/my-account.php");
            } else {
                echo "SORRY, INCORRECT USERNAME OR PASSWORD";
            }
        } else {
            if (password_verify($si_password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                header("Location: /php/my-account.php");
            } else {
                echo "SORRY, INCORRECT USERNAME OR PASSWORD";
            }
        }
    }
}


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
        if (password_verify($rep_new_password, $new_password)) {
            mysqli_query($sqlserver, "UPDATE users SET password = '$new_password' WHERE username = '$si_username'");
            $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
            $row = mysqli_fetch_array($query);
            session_unset();
            $_SESSION = $row;
            if (password_verify($rep_new_password, $row['password'])) {
                echo "PASSWORD SUCCESSFULLY CHANGED";
                mysqli_query($sqlserver, "UPDATE users SET user_set_password = 1 WHERE username = '$si_username'");
                //todo add redirect here back to account page or...?
            } else {
                echo "SOMETHING WENT WRONG";
                //todo add redirect here to...?
            }
        }
    }
}

//account info update
function infoChange($sqlserver, $si_username, $ph_number, $comm_method){
    $ph_number = mysqli_real_escape_string($sqlserver, $ph_number);

    $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
    $row = mysqli_fetch_array($query);

    if ($row['phone_number'] != $ph_number) { //update phone number
        mysqli_query($sqlserver, "UPDATE users SET phone_number = '$ph_number' WHERE username = '$si_username'");
        session_unset();
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
        $row = mysqli_fetch_array($query);
        $_SESSION = $row;
    }
    if ($row['comm_method'] != $comm_method) { //update communication method
        mysqli_query($sqlserver, "UPDATE users SET preferred_communication = $comm_method WHERE username = '$si_username'");
        session_unset();
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
        $row = mysqli_fetch_array($query);
        $_SESSION = $row;
    }
}


function commFind($contactForm, $ph_number) {
    if(!empty($ph_number)){
        if(in_array("email", $contactForm)){
            if(in_array("sms", $contactForm)){
                return 2;
            } else {
                return 0;
            }
        } elseif (in_array("sms", $contactForm)){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}


//account page buttons
if (isset($_POST['pass-reset-submit'])) { //password change
    passChange($conn, $_SESSION['username'], $_POST['current-password'], password_hash($_POST['new-password'], PASSWORD_DEFAULT), $_POST['repeat-new-password']);
} elseif (isset($_POST['pass-reset-cancel'])) { //password change cancel
    myAccountReset();
} elseif (isset($_POST['ma-submit'])) { //account info change
    $commType = commFind($_POST['comm-method'], $_POST['ma-phone-number']);
    echo "commtype: " . $commType;
    echo print_r($_POST['comm-method']);
    infoChange($conn, $_SESSION['username'], $_POST['ma-phone-number'], $commType);
} elseif (isset($_POST['ma-reset'])) { //account info change cancel
    myAccountReset();
}

//reset buttons
function myAccountReset() {
    header("LOCATION: /php/my-account.php");
}

?>
