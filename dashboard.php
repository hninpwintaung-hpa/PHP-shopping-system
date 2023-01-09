<?php
include "user_auth.php";
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
    <title>Thaton Shopping >> Dashboard</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php  include "navbar.php";?>
<div class="container">
    <?php

    if(isset($_SESSION['login']['role'])){
        ?>
        <div class="row">
            <div class="col-xs-6">
                <div class="panel panel-success">
                    <div class="panel-body" style="background: burlywood">
                        <h4>
                            <i class="glyphicon glyphicon-tags"></i> Posts
                        </h4>
                        <hr>
                        <a style="display: block ;color: darkblue" href="posts.php">More >> </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="panel panel-warning">
                    <div class="panel-body" style="background: gainsboro">
                        <h4>
                            <i class="glyphicon glyphicon-list-alt"></i> Categories
                        </h4>
                        <hr>
                        <a style="display: block ;color: darkblue" href="categories.php">More >> </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-9">
                <div class="panel panel-primary">
                    <div class="panel-body" style="background: palegreen">
                        <h4>
                            <i class="glyphicon glyphicon-qrcode"></i> Orders
                        </h4>
                        <hr>
                        <a style="display: block ;color: #204d74" href="orders.php">More >> </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else{
        ?>
        <h4>Your order items.</h4>
        <?php
        $orders=$shop->getOrderForUser();
        foreach ($orders as $ord):
            ?>

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4" style="border-right: 1px solid">
                            <p>Order ID:<?php echo $ord['id'] ?></p>
                            <p>Name    :<?php echo $ord['full_name'] ?></p>
                            <p>Email   :<?php echo $ord['email'] ?></p>
                            <p>Phone   :<?php echo $ord['phone'] ?></p>
                            <p>Address :<?php echo $ord['address'] ?></p>
                            <p>Order Date:<?php echo date("D m/Y h:i A",strtotime($ord['order_at'])) ?></p>
                            <p>Status :<?php if($ord['status']){
                                echo "<span class='text-success'>Finished Delivered</span>";
                                }
                            else{
                                echo "<span class='text-warning'>Waiting for Delivered</span>";

                            }?></p>

                         </div>
                        <div class="col-sm-8">
                            <table class="table table-hover">
                                <tr>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                                <?php
                                $items=$shop->getOrderItems($ord['id']);
                                $totalAmount=0;
                                foreach ($items as $i){
                                    $totalAmount +=$i['qty'] * $i['price'];
                                     ?>
                                    <tr>
                                        <td><?php echo $i['item_name']?></td>
                                        <td><?php echo $i['price'] ?></td>
                                        <td><?php  echo $i['qty'] ?></td>
                                        <td><?php echo $i['qty'] *$i['price'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right">Total Amount:</td>
                                    <td><?php echo $totalAmount; ?></td>
                                </tr>
                            </table>

                        </div>
                </div>
              </div>
            </div>


        <?php

            endforeach;
        ?>

    <?php

    }
    ?>

</div>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>