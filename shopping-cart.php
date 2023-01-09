<?php

session_start();
if(!isset($_SESSION['cart'])){
    header("location:index.php");
    exit();

}
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
    <title>Thaton Shopping >> Shopping Cart</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <?php
            if (!isset($_SESSION['login'])){
                ?>
                <p> Please login <a href="login.php">here</a> to continued your order. </p>
            <?php
            }else{
                ?>
                <p><h4>Fill your address to delivered.</h4></p>
                <form method="post" action="checkout_order.php">
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input required type="text" name="full_name" id="full_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" id="address" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary ">Confirm</button>
                    </div>

                </form>
            <?php
            }
            ?>

        </div>
        <div class="col-sm-8">
            <h4>Your Shopping Cart.</h4>
            <table class="table table-hover">
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
                <?php
                foreach ($_SESSION['cart'] as $id=>$qty){

                    $posts=$shop->getPostForCart($id);
                    foreach ($posts as $item){
                        ?>
                        <tr>
                            <td><?php echo $item['item_name'] ?></td>
                            <td><?php echo $item['price'] ?></td>
                            <td>
                                <a href="decrease-cart.php?id=<?php echo $item['id'] ?>"><i class="glyphicon glyphicon-minus-sign"></i></a>
                                <?php echo $qty; ?>
                                <a href="increase-cart.php?id=<?php echo $item['id'] ?>"><i class="glyphicon glyphicon-plus-sign"></i></a>
                            </td>
                            <td><?php echo $qty* $item['price'];?></td>
                        </tr>
                        <?php
                    }

                }
                ?>
            </table>
            <div class="col-sm-6">
                <a href="index.php">Continue Shopping</a>

            </div>
            <div class="col-sm-6">
                <a href="cancel-shopping.php">Cancel Shopping</a>

            </div>
        </div>
    </div>
</div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>