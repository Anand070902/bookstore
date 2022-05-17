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
                     <div class="col-8">
                            <h4>Manage Books</h4>
                         </div>
                         <div class="col-4">
                             <a href="insertBook.php" class="btn btn-success float-end">Add Book</a>
                         </div>
                     <div class="col-3 mt-3">
        <?php include "include/side.php"; ?>
                       
                      </div>
                     <div class="col-6 mt-3">
                       <table class="table">
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>Action</th>
                        </tr>
                         <?php
                         $callinggenres = mysqli_query($connect,"select * from genres");
                         while($row = mysqli_fetch_array($callinggenres)){
                             ?>
                             <tr>
                                 <td><?= $row['id'];?></td>
                                 <td><?= $row['cat_title'];?></td>
                                 <td>
                                     <a href="manageGenres.php?id=<?= $row['id'];?>" class="btn btn-danger">X</a>
                                     <a href="editGenre.php?edit=<?= $row['id'];?>" class="btn btn-info">edit</a>
                                     <a href="../view.php?book_id=<?= $row['id'];?>" class="btn btn-success">view</a>

                         </td>
                         </tr>

                         <?php }  ?>


                           </table>
                          </div>
                          <div class="col-3 mt-3">
                              <div class="card">
                                  <div class="card-body">
                                      <h5>Insert Genres</h5>
                                      <form action="" method="post">
                                          <div class="mb-3">
                                          <label for="">title</label>
                                           <input type="text" class="form-control" name="cat_title">
                                          </div> 
                                          <div class="mb-3">
                                             <input type="submit" value="submit" class="btn btn-success w-100" name="send">
                                          </div>
                         </form>
                                  
                         <?php
                           if(isset($_POST['send'])){
                               $cat_title = $_POST['cat_title'];

                               $query = mysqli_query($connect,"insert into genres (cat_title) value ('$cat_title')");
                           
                         if($query){
                            echo "<script>window.open('manageGenres.php','_self')</script>";
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
                <?php
                         
                         if(isset($_GET['id'])){
                             $id=$_GET['id'];
                             $query=mysqli_query($connect, "DELETE from genres where id='$id'");
                             if($query){
                                echo "<script>window.open('manageGenres.php','_self')</script>";
                         }
                      } 
                         ?>
                        

</body>
</html>