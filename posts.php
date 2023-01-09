<?php
include "user_auth.php";
include "admin_auth.php";
include "post_config.php";

$p=new Post();
$posts=$p->getPost();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >> Posts</title>
    <link href="bootstrap/css/bootstrap.css"  rel="stylesheet">
    <link href="bootstrap/css/bootstrap-datatable.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php";?>
<div class="container">
    <?php include "message.php"; ?>
    <div class="page-header">
        <h5>
            <i class="glyphicon glyphicon-tags"></i> Posts
            <a href="new_post.php" class="pull-right">
                <i class="glyphicon glyphicon-plus-sign"></i> New Post
            </a>
        </h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="postTable">
            <thead>
            <tr style="background: gainsboro">
                <th>ID</th>
                <th>Images</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
             <?php
             foreach ($posts as $p):
             ?>
             <tr>
                 <td><?php echo $p['id'] ?></td>
                 <td class="col-sm-2"><img class="img-responsive img-rounded" src="posts/<?php echo $p['image'] ?>"></td>
                 <td><?php echo $p['item_name'] ?></td>
                 <td><?php echo $p['price'] ?></td>
                 <td><?php echo $p['category_name'] ?></td>
                 <td><?php echo date("d m/Y h:i A",strtotime ($p['post_at']))?></td>
                 <td>

                     <a href="edit_post.php?id=<?php echo $p['id'] ?>"><i class="glyphicon glyphicon-edit"></i> </a>



                     <a href="#" class="text-danger" data-toggle="modal" data-target="#d<?php echo $p['id']?>" >
                         <i class="glyphicon  glyphicon-remove-circle"></i>
                     </a>
                     <div id="d<?php echo $p['id']?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                         <div class="modal-dialog modal-sm">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     Confirm
                                 </div>
                                 <div class="modal-body text-center">
                                     <i class="glyphicon glyphicon-warning-sign"></i>
                                     <p>
                                         This will delete item name of
                                         <b>"<?php echo $p['item_name']?>".</b>
                                     </p>
                                 </div>
                                 <div class="modal-footer">
                                     <a href="delete_post.php?post_id=<?php echo $p['id']?>">Agree</a>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </td>
             </tr>
            <?php endforeach;
            ?>
        </table>
    </div>
</div>



<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/jquery-datatable.js"></script>
<script src="bootstrap/js/bootstrap-datatable.js"></script>

<script>
    $(function (){
        $("#postTable").dataTable();
    })
</script>

<script>
    $(function () {
        setTimeout(function () {
            $(".alert").fadeOut();

        },2000)

    })
</script>

</body>
</html>
