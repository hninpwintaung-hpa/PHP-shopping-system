<?php

include "user_auth.php";
include "admin_auth.php";
include "post_config.php";

$id=$_GET['id'];

$p=new Post();
$post=$p->getPostOne($id);
$cats=$p->getCategory();

//print_r($post);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >> Edit Post</title>
    <link href="bootstrap/css/bootstrap.css"  rel="stylesheet">
</head>
<body>
<?php include "navbar.php";?>
<div class="container">
    <div class="page-header">
        <h5>
            <i class="glyphicon glyphicon-edit"></i> Edit Post
            <a href="posts.php" class="pull-right">
                <i class="glyphicon glyphicon-tags"></i> Posts
            </a>
        </h5>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <?php include "message.php"; ?>

            <form enctype="multipart/form-data" method="post" action="update_post.php">
                <input type="hidden" name="post_id" value="<?php echo $post['id']?>">
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input accept="image/*" type="file" name="image" id="image" >
                </div>
                <div class="form-group">
                    <label for="item_name">Item Name:</label>
                    <input value="<?php echo $post['item_name']?>" type="text" name="item_name" id="item_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input value="<?php echo $post['price']?>" type="number" name="price" id="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <?php
                        foreach ($cats as $c){
                            ?>
                            <option <?php if ($post['category_id']==$c['id']){ echo "selected";} ?>
                                value="<?php echo $c['id']?>"><?php echo $c['category_name']?>
                            </option>
                            <?php
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script>
    $(function () {
        setTimeout(function () {
            $(".alert").fadeOut();

        },2000)

    })
</script>
</body>
</html>

