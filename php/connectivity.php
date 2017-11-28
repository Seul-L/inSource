<?php
$servername = "*";
$database = "user_info";
$username = "*";
$password = "*";

//connect to mysql
$conn = mysqli_connect($servername, $username, $password, $database);
//mysqli_select_db($conn, $database);

//check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . $conn->connect_error);
    }
//echo "Connected Successfully";
//echo !empty($_POST[user]);

function signIn($sqlserver, $si_username, $si_password) {
    session_start(); //starting session for the profile page
    if(!empty($si_username)) { //check username field has value
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE Username = '$si_username' AND password = '$si_password'") or die (mysqli_error($sqlserver));
        $row = mysqli_fetch_array($query) or die(mysqli_error($sqlserver));
        if(!empty($row['username']) AND !empty($row['password'])) {
            $_SESSION = $row;
            echo "SUCCESSFULLY LOGGED IN";
            header("Location: /php/my-account.php");
        }
        else {
            echo "SORRY, INCORRECT USERNAME OR PASSWORD";
        }
    }
}
if(isset($_POST['password-submit'])) {
    signIn($conn, $_POST[user], $_POST[pass]);
}
?>
