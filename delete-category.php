<?php

include "user_auth.php";
include "admin_auth.php";
include "post_config.php";

$id=$_GET['id'];

$p=new Post();
$p->deleteCategory($id);