<?php
include "user_auth.php";

if(!$_SESSION['login']['role']){
    header("location: dashboard.php");
    exit();
}
?>