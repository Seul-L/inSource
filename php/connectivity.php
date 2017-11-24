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
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE Username = '$si_username' AND password = '$si_password'") or die (mysqli_error($sqlserver));
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
    signIn($conn, $_POST[user], $_POST[pass]);
}

/* account page */
function passChange($sqlserver, $si_username, $si_password, $new_password, $rep_new_password) {
    if(!empty($si_username) and !empty($current_password) and !empty($new_password) and $new_password == $rep_new_password){

    }
}

//account page password change
if(isset($_POST['pass-reset-submit'])){

}
?>
