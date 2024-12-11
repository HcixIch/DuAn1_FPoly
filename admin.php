<?php
session_start();
    if( ($_SESSION['user'][0]['role'] > 0)){
        header("location:index.php?ctrl=admin");
    }else {
        header("location:index.php");
    }
?>