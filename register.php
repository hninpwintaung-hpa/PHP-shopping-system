<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >> Register</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        h2{
            color: #2b669a;
            margin-bottom: 40px;
        }
        button{
            width: 75px;
            height: 35px;

        }
        a{
            text-decoration: underline;
        }

    </style>
</head>
<body>
<?php  include "navbar.php";?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-lg-offset-4">

            <?php include "message.php"; ?>

            <h2 class="text-center">Signup new account </h2>
            <form method="post" action="post-register.php">
                <div class="form-group">
                    <label for="name">User name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control"required>
                </div>
                <div class="form-group">
                    <label for="confirm_password"> Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
            Already  have an account?<a href="login.php"> Sign In</a>
        </div>
    </div>
</div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>