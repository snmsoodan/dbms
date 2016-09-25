<?php
    session_start();
    session_destroy();
    header("location:successful_buy.php");
?>