<?php
$totalQty=0;
if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $id=>$qty){
        $totalQty +=$qty;
    }
}
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

            <form method="get" action="index.php" class="navbar-form navbar-left">
                <div class="form-group">
                    <input required name="search" type="text" class="form-control" placeholder="Search">
                </div>
            </form>

            <ul class="nav navbar-nav">

                <li class="active">
                    <a href="shopping-cart.php">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <?php echo $totalQty; ?>
                    </a>
                </li>

               <?php
               $cats=$shop->getCategory();

               foreach ($cats as $c){
                   ?>
                   <li>
                       <a href="index.php?cat_id=<?php echo $c['id'] ?>"><?php echo $c['category_name']?></a>
                   </li>
                <?php
               }

               ?>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>