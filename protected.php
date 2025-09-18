<?php
    include("../php/config.php");
    session_start();
    $user_id = $_SESSION["user_id"];
    if (!isset($_SESSION["user_id"])) {
        header("Location: /task-management/login");
        exit();
    };
    $logged_user_details = $conn->query("SELECT * FROM employees WHERE employee_id='$user_id'");
    $logged_user = $logged_user_details->fetch();
?>