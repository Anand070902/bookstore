
<?php include "dbConfig.php";
   
   $id = $_GET['book_id'];

   if(!isset($_GET['book_id'])){
           echo "<script>window.open('index.php','_self')</script>";
   }

   $query = mysqli_query($connect,"select * from books where id='$id'");

   $row = mysqli_fetch_array($query);

?>
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
        <?php include "header.php"; ?>

<div class="container mt-4">
       
                <div class="col-12">
                     <div class="row">
                           <div class="card w-25" style="height:250px";>
                           <div class="col-9 ms-2 mt-2">
                                <img style="height:200px;" src="admin/images/<?= $row['cover'];?>" alt="" class="w-100 ms-4">
                            <h5 class="ms-4 mt-2 text-warning"><?= $row[ 'author' ];?></h5>

                            </div>
                           </div>
                            <div class="card w-75">
                            <div class="col-9">
                                <table class="table">
                                    <tr>
                                        <th>Title</th>
                                        <td><?= $row['title'];?></td>
                    </tr>
                    <tr>
                                        <th>Author</th>
                                        <td><?= $row['author'];?></td>
                    </tr>
                    <tr>
                                        <th>ISBN</th>
                                        <td><?= $row['isbn'];?></td>
                    </tr>
                    <tr>
                                        <th>Nop</th>
                                        <td><?= $row['nop'];?></td>
                    </tr>
                                </table>
                                <div class="col-12">
                                    <h5 class="text-primary fs-6 ">₹ <?= $row['discount_price'];?> <del  class = 'fs-6 ms-2 text-secondary'> ₹<?= $row['price'];?></del>
                                    <a href="" class="btn btn-success ms-5">Buy Now</a>
                                    <a href="" class="btn btn-danger ms-2">Add to Cart</a></h5>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
        </div>
</div>

</body>
</html>
