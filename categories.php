<?php
include "user_auth.php";
include "admin_auth.php";
include "post_config.php";

$p=new Post();
$cats=$p->getCategory();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thaton Shopping >> Category</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="page-header">
        <h5><i class="glyphicon glyphicon-th-list"></i> Categories </h5>

        <?php include "message.php";?>

    </div>
    <div class="row">
        <div class="col-sm-4">
            <p style="margin-bottom: 30px">
                <i class="glyphicon glyphicon-plus-sign"></i> New Categories
            </p>
            <form method="post" action="new_category.php">
                <div class="form-group">
                    <label for="category_name">Category Name:</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>

        </div>
        <div class="col-sm-8">
            <p style="margin-bottom: 20px">
                <i class="glyphicon glyphicon-list-alt"></i> Available Categories
            </p>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($cats as $c) {
                    ?>
                    <tr>
                        <td><?php echo $c['id'] ?></td>
                        <td><?php echo $c['category_name'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#e<?php echo $c['id']?>">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <div id="e<?php echo $c['id']?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                            <div class="modal-dialog modal-md">
                                <form method="post" action="update_category.php">
                                    <input type="hidden" name="id" value="<?php echo $c['id']?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Edit Category
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_name">Category Name: </label>
                                                <input value="<?php echo $c['category_name']?>" type="text" name="category_name" id="category_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Change</button>

                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>

                            <a href="#" class="text-danger" data-toggle="modal" data-target="#d<?php echo $c['id']?>" >
                                <i class="glyphicon  glyphicon-remove-circle"></i>
                            </a>

                            <div id="d<?php echo $c['id']?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Confirm
                                        </div>
                                        <div class="modal-body text-center">
                                            <i class="glyphicon glyphicon-warning-sign"></i>
                                            <p>
                                                This will delete the category name of
                                                 <b>"<?php echo $c['category_name']?>".</b>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="delete-category.php?id=<?php echo $c['id']?>">Agree</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }?>

            </table>

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

