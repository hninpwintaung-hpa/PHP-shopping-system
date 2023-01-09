<?php

include "user_auth.php";
include "config.php";

$f_name=$_POST['full_name'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$shop=new Shop();
$shop->checkOutOrder($f_name,$phone,$address);