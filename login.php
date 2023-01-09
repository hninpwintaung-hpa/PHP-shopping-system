<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >>Login</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        h2{
            color: #2b669a;
            margin-bottom: 40px;
        }
        button {
            width: 75px;
            height: 35px;
        }

    </style>
</head>
<body>
<?php  include "navbar.php";?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-lg-offset-4">

            <?php include "message.php"; ?>

            <h2 class="text-center">Signin to continued </h2>
            <form method="post" action="post-login.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
            Don't have an account?<a href="register.php"> Register now.</a>
        </div>
    </div>
</div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>