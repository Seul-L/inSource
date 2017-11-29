<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 2017-11-26
 * Time: 12:02 PM
 */
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: http://localhost");
}

?>