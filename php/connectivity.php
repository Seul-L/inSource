<?php
session_start(); //starting session

$servername = "127.0.0.1";
$database = "user_info";
$username = "j2towers";
$password = "password";


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
    $username = mysqli_real_escape_string($conn, $_POST['user']); //stripslashes($_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']); //stripslashes($_POST['pass']);
    signIn($conn, $username, $password);
}

/* account page */
//password update
function passChange($sqlserver, $si_username, $current_password, $new_password, $rep_new_password)
{
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
                //todo add redirect here back to account page or...?
            } else {
                echo "SOMETHING WENT WRONG";
                //todo add redirect here to...?
            }
        }
    }
}

//account page password change
if (isset($_POST['pass-reset-submit'])) {
    $currentpass = mysqli_real_escape_string($conn, $_POST['current-password']);
    $repeatnewpass = mysqli_real_escape_string($conn, $_POST['repeat-new-password']);
    passChange($conn, $_SESSION['username'], $currentpass, password_hash($_POST['new-password'], PASSWORD_DEFAULT), $repeatnewpass);
}

//reset buttons
function myAccountReset() {
    header("LOCATION: /php/my-account.php");
}

//account page password reset
if (isset($_POST['pass-reset-cancel'])) {
    myAccountReset();
}

//account page user info reset
if (isset($_POST['ma-reset'])) {
    myAccountReset();
}

//

?>
