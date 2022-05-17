<?php
 include "../dbConfig.php";


 if(!isset($_SESSION['admin'])){
    echo "<script>window.open('../login.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include "include/header.php"; ?>

    <div class="container ">
        <div class="row">
            <div class="col-3 mt-3">
              <?php
              include "include/side.php"; ?>
            </div>
            <div class="col-8 mt-3 ms-5">
                <div class="row">
                    <div class="col-8">
                        <h4>Manage Books</h4>
                    </div>
                    <div class="col-3">
                        <a href="insertBook.php" class="btn btn-success float-end">Add Book</a>
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-3">
                    <?php
                       $id=$_GET['edit'];
                            

                                $query = mysqli_query($connect,"select * from genres where  id='$id' ");

                                $row=mysqli_fetch_array($query);
                            
                            ?>
                    
                    <div class="card">
                        <div class="card-body">
                            <h4>Insert Genres</h4>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="cat_title" value="<?= $row['cat_title']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info w-100" name="submit">
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];

                                $query = mysqli_query($connect,"UPDATE genres SET cat_title = '$cat_title' WHERE id='$id' ");

                                if($query){
                                    echo"<script>window.open('manageGenres.php','_self')</script>";
                            
                                }
                            }
                            ?>

                        </div>
                    </div>
                        </div>
                </div>
              
            </div>
        </div>
    </div>

   
    
</body>
</html>