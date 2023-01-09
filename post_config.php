<?php
session_start();
class Post{

    public $db;
    public function __construct()
    { try{
        $this->db=new PDO("mysql:host=localhost;dbname=thatonshopping","root","");

    }catch (PDOException $e){
        die("Connection failed to database server.");
    }
    }
    public function updatePost($id,$item_name,$price,$category_id,$image){
        $user_id=$_SESSION['login']['id'];
        if(!empty($image['name'])){

            $old_sql="select image from posts where id='$id'";
            $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
            $old_image=$old_row['image'];

            unlink("posts/$old_image");        //delete old image

            $image_name=date("d-m-y-h-i-s")."-".$image['name'];
            $img_tmp=$image['tmp_name'];

            move_uploaded_file($img_tmp,"posts/$image_name");
            $sql="update posts set image='$image_name', item_name='$item_name',price='$price',category_id='$category_id',user_id='$user_id' where id='$id'";

        }else{
            $sql="update posts set item_name='$item_name',price='$price',category_id='$category_id',user_id='$user_id' where id='$id'";
        }
        $this->db->query($sql);
        $_SESSION['success']="The selected post have been updated.";
        header("location: posts.php");

    }
    public function getPostOne($id){
        $sql="select * from posts where id='$id'";
         return  $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

    }
    public function deletePost($id){
        $old_sql="select image from posts where id='$id'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        $old_image=$old_row['image'];

        unlink("posts/$old_image");

        $sql="delete from posts where id='$id'";
        $this->db->query($sql);
        $_SESSION['success']="The selected item have been deleted.";
        header("location:posts.php");
    }
    public function getPost(){
        $sql="select posts.*,category.category_name from posts left join category on category.id=posts.category_id order by id desc ";
        return $this->db->query($sql);
    }
    public function newPost($image,$item_name,$price,$category_id){
        $img_name=date("d-m-y-h-i-s")."-".$image['name'];
        $img_tmp=$image['tmp_name'];
        $user_id=$_SESSION['login']['id'];

        $sql="insert into posts (item_name,price,image,category_id,user_id,post_at)
                          values ('$item_name','$price','$img_name','$category_id','$user_id',now())";
        $r=$this->db->query($sql);
        if($r){
            move_uploaded_file($img_tmp,"posts/$img_name");
            $_SESSION['success']="The post have been created successfully.";

        }else{
            $_SESSION['error']="The created post failed.";

        }
        header("location: new_post.php");

    }
    public function updateCategory($c_id,$c_name){
        $update="update category set category_name='$c_name'  where id='$c_id'";
        $this->db->query($update);
        $_SESSION['success']="The selected category have been updated.";
        header("location:categories.php");

    }
    public function deleteCategory($id){
        $delete="delete from category where id='$id'";
        $this->db->query($delete);
        $_SESSION['success']="The selected category have been deleted.";
        header("location: categories.php");

    }
    public function getCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }
    public function newCategories($category_name){
        $old_sql="select* from category where category_name='$category_name'";
        $row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
        if(empty($row)) {
           // echo $category_name;
            $insert="insert into category (category_name) values ('$category_name')";
            $this->db->query($insert);
            $_SESSION['success']="The category have been created.";
            header("location:categories.php");

        }else{
            $_SESSION['error']="The selected category name is exists.";
            header("location:categories.php");
        }
    }

}