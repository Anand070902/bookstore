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

                    <div class="container-fluid mt-4">
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
                  
                  <div class="col-8">
                  <?php
                     $id=$_GET['edit'];
                          

                              $query = mysqli_query($connect,"select * from books where  id='$id' ");

                              $row=mysqli_fetch_array($query);
                          
                          ?>
                  
                  <div class="card">
                      <div class="card-body">
                          <h4>Insert books</h4>
                          <form action="" method="post" enctype="multipart/form-data">
                              <div class="mb-3">
                                  <label for="">Title</label>
                                  <input type="text" class="form-control" name="title" value="<?= $row['title']; ?>">
                              </div>
                              <div class="mb-3">
                                  <label for="">Author</label>
                                  <input type="text" class="form-control" name="author" value="<?= $row['author']; ?>">
                              </div>
                              <div class="mb-3">
                          <label for="">price</label>
                          <input type="text" class="form-control" name="price" value="<?= $row['price']; ?>">
                      </div> 
                       <div class="mb-3">
                          <label for="">discount_price</label>
                          <input type="text" class="form-control" name="discount_price" value="<?= $row['discount_price']; ?>">
                      </div>
                      <div class="mb-3">
                          <label for="">cover</label>
                          <input type="file" class="form-control" name="cover" value="<?= $row['cover']; ?>">
                      </div>
                      <div class="mb-3">
                          <label for="">isbn</label>
                          <input type="text" class="form-control" name="isbn" value="<?= $row['isbn']; ?>">
                      </div>
                      <div class="mb-3">
                          <label for="">nop</label>
                          <input type="text" class="form-control" name="nop" value="<?= $row['nop']; ?>">
                      </div>
                              <div class="mb-3">
                                  <input type="submit" name="submit" class="btn btn-success">
</div>
</form>
                              <?php
                              if(isset($_POST['submit'])){
                           $title = $_POST['title'];
                           $author = $_POST['author'];
                              $price = $_POST['price'];
                              $discount_price= $_POST['discount_price'];
                              $isbn= $_POST['isbn'];
                              $nop= $_POST['nop']; 
                            
                              $image = $row['cover'];

                              if($_FILES['cover']['name'] != ""){
                                $image= $_FILES['cover']['name'];
                                $tmp_image= $_FILES['cover']['tmp_name'];
                                move_uploaded_file($tmp_image,"images/$image");
                              }


                              $query = mysqli_query($connect,"UPDATE books SET title = '$title' , author = '$author' , price = '$price' , discount_price = '$discount_price' , isbn = '$isbn' , nop = '$nop' , cover = '$image' WHERE id='$id' ");

                              if($query){
                                  echo"<script>window.open('manageBooks.php','_self')</script>";
                          
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
