<?php
session_start();
 class Shop{
     public $db;
     public function __construct()
     {
         try {
             $this->db = new PDO("mysql:host=localhost;dbname=thatonshopping", "root", "");

         } catch (PDOException $e) {
             die("Connection failed to database server.");
         }
     }
     public function doDelivered($id){
         $sql="update orders set status=1 where id='$id'";
         $this->db->query($sql);
         header("location: orders.php");
     }
     public function getOrdersForAdmin(){
         $sql="select * from orders order by id desc ";
         return $this->db->query($sql);
     }
     public function getOrderForUser(){
         $email=$_SESSION['login']['email'];
         $sql="select * from orders where email='$email'";
         return $this->db->query($sql);
     }
     public function getOrderItems($order_id){
         $sql="select * from order_item where order_id='$order_id'";
         return $this->db->query($sql);
     }
     public function checkOutOrder($f_name,$phone,$address){
         $email=$_SESSION['login']['email'];
         $sql_order="insert into orders (full_name,email,phone,address,order_at) values ('$f_name','$email','$phone','$address',now())";
         $this->db->query($sql_order);
         $order_id=$this->db->lastInsertId();

         foreach ($_SESSION['cart'] as $id=>$qty){
             $posts="select * from posts where id='$id'";
             $items=$this->db->query($posts);

              foreach ($items as $i){
                  $item_name=$i['item_name'];
                  $price=$i['price'];

                  $sql="insert into order_item (item_name,price,qty,order_id) values ('$item_name','$price','$qty','$order_id')";
                  $this->db->query($sql);
              }
         }

         unset($_SESSION['cart']);
         header("location: thanks.php");

     }
     public  function getPostForCart($id){
         $sql="select * from posts where id='$id'";
         return $this->db->query($sql);

     }
     public function getPostSearch($search){
         $sql="select posts.*,category.category_name,users.name from posts left join category on category.id=posts.category_id left join 
                   users on users.id=posts.user_id where item_name LIKE '%$search%' order by id desc ";
         return $this->db->query($sql);
     }
     public function  getPostByCategory($cat_id){
         $sql="select posts.*,category.category_name,users.name from posts left join category on category.id=posts.category_id left join 
                   users on users.id=posts.user_id where category_id='$cat_id' order by id desc ";
         return $this->db->query($sql);

     }
     public function getPosts(){
         $sql="select posts.*,category.category_name,users.name from posts left join category on category.id=posts.category_id left join 
                   users on users.id=posts.user_id order by id desc ";
         return $this->db->query($sql);
     }
     public function getCategory(){

         $sql="select * from category";
         return $this->db->query($sql);
     }
}