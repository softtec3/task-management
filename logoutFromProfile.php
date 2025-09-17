<?php
    session_start();
    unset($_SESSION["verify_user"]);
    header("Location: ../task-management");
    exit();

?>