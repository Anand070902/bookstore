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

                  <form action="" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                          <label for="">title</label>
                          <input type="text" class="form-control" name="title">
                      </div>
                      <div class="mb-3">
                          <label for="">author</label>
                          <input type="text" class="form-control" name="author">
                      </div> 
                       <div class="mb-3">
                          <label for="">get_declared_interfaces</label>
                          <select class="form-select" name="genre_id">
                          <?php
                         $callinggenres = mysqli_query($connect,"select * from genres");
                         while($row = mysqli_fetch_array($callinggenres)){
                             ?>
                             <option value="<?= $row['id'];?>"><?= $row['cat_title'];?></option>
                             <?php } ?>
                         </select>
                      </div> 
                       <div class="mb-3">
                          <label for="">description</label>
                          <textarea name="description" class="form-control"></textarea>
                      </div> 
                       <div class="mb-3">
                          <label for="">price</label>
                          <input type="text" class="form-control" name="price">
                      </div> 
                       <div class="mb-3">
                          <label for="">discount_price</label>
                          <input type="text" class="form-control" name="discount_price">
                      </div>
                      <div class="mb-3">
                          <label for="">cover</label>
                          <input type="file" class="form-control" name="cover">
                      </div>
                      <div class="mb-3">
                          <label for="">isbn</label>
                          <input type="text" class="form-control" name="isbn">
                      </div>
                      <div class="mb-3">
                          <label for="">nop</label>
                          <input type="text" class="form-control" name="nop">
                      </div>
                      <div class="mb-3">
                          <input type="submit" value="submit" class="btn btn-success w-100" name="send">
                      </div>
</form>
                        <?php
                       if(isset($_POST['send'])){
                           
                        $title = $_POST['title'];
                        $author= $_POST['author'];
                        $genre_id= $_POST['genre_id'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        $discount_price= $_POST['discount_price'];
                        $isbn= $_POST['isbn'];
                        $nop= $_POST['nop']; 

                        $image= $_FILES['cover']['name'];
                        $tmp_image= $_FILES['cover']['tmp_name'];
                        move_uploaded_file($tmp_image,"images/$image");


                        $query = mysqli_query($connect, "insert into books (title,author,genre_id,description,price,discount_price,cover,isbn,nop) value ('$title','$author','$genre_id','$description','$price','$discount_price','$image','$isbn','$nop')");

                             if($query){
                             echo "<script>window.open('manageBooks.php','_self')</script>";
                         }
                         else{
                             echo "<script> alert('insert fail')</script>";
                         }
                    }
                    ?>





</div>
</div>
</div>

</body>
</html>