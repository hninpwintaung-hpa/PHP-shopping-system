<?php
include "user_auth.php";
include "admin_auth.php";
include "post_config.php";

$post_id=$_GET['post_id'];

$p=new Post();
$p->deletePost($post_id);