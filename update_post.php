<?php
include "user_auth.php";
include "admin_auth.php";
include "post_config.php";

$id=$_POST['post_id'];
$item_name=$_POST['item_name'];
$price=$_POST['price'];
$category_id=$_POST['category_id'];
$image=$_FILES['image'];

$p=new Post();
$p->updatePost($id,$item_name,$price,$category_id,$image);

?>