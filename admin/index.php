<?php include "../dbConfig.php";
isAuth();?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
        <?php include "include/header.php"; ?>

<div class="container mt-4">
        <div class="row">
                <div class="col-3">
        <?php include "include/side.php"; ?>
                </div>
                <div class="col-9">
                        <div class="row">
                                <div class="col-6">
                                        <div class="card bg-warning text-white">
                                                <div class="card-body">
                                                        <h2 class="display-5"><?= $count = mysqli_num_rows(mysqli_query($connect,"select * from books"))?>+</h2>
                                                        <h6>Total</h6>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-6">
                                        <div class="card bg-success text-white">
                                                <div class="card-body">
                                                        <h2 class="display-5"><?= $count = mysqli_num_rows(mysqli_query($connect,"select * from genres"))?>+</h2>
                                                        <h6>Total Genres</h6>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>

</body>
</html>