<?php
session_start();
class User{
    public $db;
    public function __construct()
    { try{
        $this->db=new PDO("mysql:host=localhost;dbname=thatonshopping","root","");

    }catch (PDOException $e){
        die("Connection failed to database server.");
    }
    }
    public function login($email,$password){
        $sql="select * from users where email='$email'";
        $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)){
            $old_password=$row['password'];
            $new_password=md5($password);
            if ($new_password==$old_password){
                $_SESSION['login']=$row;
                header("location:dashboard.php");

            }else{
                $_SESSION['error']="Authentication failed.";
                header("location: login.php");
            }

        }else{
            $_SESSION['error']="The selected email is invalid.";
            header("location: login.php");
        }
    }
    public function register($name,$email,$password,$confirm_password){
       $sql="select email from users where email='$email'";
       $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
       if (empty($row)){
           if($password==$confirm_password){
               $enc_password=md5($password);
               $insert ="insert into users (name,email,password,created_at) values ('$name','$email','$enc_password',now())";
               $this->db->query($insert);
               $_SESSION['success']="The user account have been created successfully.";
               header("location:register.php");

           }else{
               $_SESSION['error']="The password and confirm password must be match.";
               header("location:register.php");
           }

       }else{
           $_SESSION['error']="The selected email is exists.";
           header("location:register.php");
       }
    }
}
