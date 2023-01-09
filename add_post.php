<?php
include "user_auth.php";
include "admin_auth.php";
include "post_config.php";

$image=$_FILES['image'];
$item_name=$_POST['item_name'];
$price=$_POST['price'];
$category_id=$_POST['category_id'];


$p=new Post();
$p->newPost($image,$item_name,$price,$category_id);


?>