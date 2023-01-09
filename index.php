<?php
include "config.php";
$shop=new Shop();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        .btnAddCart{
            display: block;
            width: 45px;
            height: 45px;
            line-height: 45px;
            border-radius: 50px;
            background:#204d74;
            text-align: center;
            color: white;
            position: absolute;
            top: 80px;
            right: 0;
        }
        .btnAddCart:hover{
            background: #6B66FF;
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

    </style>
</head>
<body>
<?php  include "navbar.php";?>

<div class="container">
    <?php include "menu.php";?>
    <div class="row">

        <?php
       // print_r($_SESSION['cart']);

        if(!empty($_GET['cat_id'])){
            $cat_id=$_GET['cat_id'];
            $posts=$shop->getPostByCategory($cat_id);

        }elseif (!empty($_GET['search'])){
            $search=$_GET['search'];
            $posts=$shop->getPostSearch($search);

        }
        else{
            $posts=$shop->getPosts();
        }

        foreach ($posts as $p):
            ?>
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
                <img src="posts/<?php echo $p['image']?>">
                <p class="text-center" style="margin-top: 10px">
                    <?php echo $p['item_name']?>
                </p>
                <div>
                    <small>
                        <i class="glyphicon glyphicon-user"></i>  <?php echo $p['name']?>
                    </small>,
                    <small>
                        <i class="glyphicon glyphicon-tags"></i>   <?php echo $p['category_name'] ?>
                    </small>,
                    <small class="badge">
                        $ <?php echo $p['price'] ?>
                    </small>
                    <a href="add-to-cart.php?id=<?php echo $p['id'] ?>" class="btnAddCart">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <i class="glyphicon glyphicon-plus-sign"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>



<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>