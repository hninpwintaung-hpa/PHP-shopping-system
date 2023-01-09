<?php include "user_auth.php";?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >> Setting</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php  include "navbar.php";?>

<div class="container">
    <div class="page-header">
        <h5><i class="glyphicon glyphicon-cog"></i> User account setting</h5>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <p>
                <i class="glyphicon glyphicon-user"> Username:<?php echo $_SESSION['login']['name']?></i>
            </p>
            <p>
                <i class="glyphicon glyphicon-envelope"> Email:<?php echo $_SESSION['login']['email']?></i>
            </p>
            <p>
                <i class="glyphicon glyphicon-pencil">
                    Role:<?php
                           if ($_SESSION['login']['role']){
                               echo "Admin";
                           }
                           else{
                               echo "User";
                           }?></i>
            </p>
            <p>
                <i class="glyphicon glyphicon-time"></i>
                     Member Since:<?php echo date("D d m/Y h:i s A",strtotime($_SESSION['login']['created_at']));?>
            </p>

        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>