<?php


//connect to mysql
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . $conn->connect_error);
    }

/* login page */
function signIn($sqlserver, $si_username, $si_password) { //sign in function
    session_start(); //starting session for the profile page
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
                header("Location: /php/my-account.php");
            } else {
                echo print_r(password_verify($si_password, $row['password']));
                echo "SORRY, INCORRECT USERNAME OR PASSWORD";
            }
        } else {
            if (password_verify($si_password, $row['password'])) {
                $_SESSION = $row;
                header("Location: /php/my-account.php");
            } else {
                echo "SORRY, INCORRECT USERNAME OR PASSWORD";
                }
            }
        }
    }


if(isset($_POST['password-submit'])) { //login page password submission
    signIn($conn, $_POST["user"], $_POST["pass"]);
}

/* account page */
function passChange($sqlserver, $si_username, $current_password, $new_password, $rep_new_password) {
    $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
    $row = mysqli_fetch_array($query);
    if (password_verify($current_password, $row['password']) and password_verify($rep_new_password, $new_password)) {
        mysqli_query($sqlserver, "UPDATE users SET password = '$new_password' WHERE username = '$si_username'");
        $query = mysqli_query($sqlserver, "SELECT * FROM users WHERE username = '$si_username'");
        $row = mysqli_fetch_array($query);
        session_unset();
        $_SESSION = $row;
        if(password_verify($rep_new_password, $row['password'])){
            echo "PASSWORD SUCCESSFULLY CHANGED";
        } else {
            echo "SOMETHING WENT WRONG";
        }
    }
}


//account page password change
if(isset($_POST['pass-reset-submit'])) {
    passChange($conn, $_SESSION['username'], $_POST['current-password'], password_hash($_POST['new-password'], PASSWORD_DEFAULT), $_POST['repeat-new-password']);
}
?>
