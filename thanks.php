<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >> Thank you</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php';?>
<div class="container">
    <div class="col-sm-6 col-sm-offset-3 text-center">
        <h3 class="text-primary">Thanks from Thaton Shopping.</h3>
        <p>we will delivered to your giving address soon!.</p>
    </div>
</div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script>
    $(function () {
        setTimeout(function () {
            window.location.replace('dashboard.php');
        }, 5000)

    })
   /* setInterval(function () {

    })*/
</script>
</body>
</html>