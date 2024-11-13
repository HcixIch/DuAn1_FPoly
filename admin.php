<?php
session_start();
    if( $_SESSION['user'][0]['role']==1){
        header("location:index.php?ctrl=admin&view=home");
    }else {
        header("location:index.php");
    }
?>