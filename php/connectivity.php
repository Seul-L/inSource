<?php
$servername = "*";
$database = "*";
$username = "*";
$password = "*";

//connect to mysql
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . $conn->connect_error);
    }

/* login page */
function signIn($sqlserver, $si_username, $si_password) { //sign in function
    session_start(); //starting session for the profile page
    if(!empty($si_username)) { //check username field has value
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username' AND password = '$si_password'") or die(mysqli_error($sqlserver));
        $row = mysqli_fetch_array($query) or die(mysqli_error($sqlserver));
        if(!empty($row['username']) AND !empty($row['password'])) {
            $_SESSION = $row;
            header("Location: /php/my-account.php");
        }
        else {
            echo "SORRY, INCORRECT USERNAME OR PASSWORD";
        }
    }
}

if(isset($_POST['password-submit'])) { //login page password submission
    signIn($conn, $_POST[signin_user], $_POST[signin_pass]);
}

/* account page */
function passChange($sqlserver, $si_username, $current_password, $new_password, $rep_new_password) {
    echo 1;
    if(!empty($current_password) and !empty($new_password) and $new_password == $rep_new_password){
        mysqli_autocommit($sqlserver, TRUE);
        if(mysqli_query($sqlserver, "UPDATE users SET password = '$new_password' WHERE username LIKE '$si_username' AND password LIKE '$current_password'") /*or die(mysqli_error($sqlserver))*/){
            echo "good";
        } else {
            echo "bad";
        }
        if(mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username' AND password = '$new_password'")){
            echo "pass";
        } else {
            echo "fail: " . mysqli_error($sqlserver);
        }
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username' AND password = '$new_password'");
        $row = mysqli_fetch_array($query);
        echo print_r($query);
        if(!empty($row['username']) AND !empty($row['password'])) {
            $_SESSION = $row;
            echo "PASSWORD SUCCESSFULLY CHANGED";
            header("Location: /html/sign-in.html");
        }
        else {
            echo "SOMETHING WENT WRONG";
        }
    }
}

//account page password change
if(isset($_POST['pass-reset-submit'])) {
    passChange($conn, $_SESSION['username'], $_POST['current-password'], $_POST['new-password'], $_POST['repeat-new-password']);
}
?>
