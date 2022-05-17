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
                     <div class="col-8">
                            <h4>Manage Books</h4>
                         </div>
                         <div class="col-4">
                             <a href="insertBook.php" class="btn btn-success float-end">Add Book</a>
                         </div>
                     <div class="col-3 mt-4">
        <?php include "include/side.php"; ?>
                      
                      </div>
                     <div class="col-9 mt-4">
                      <div class="card bg-dark text-white">
                      <table class="table-sm">
                        <tr>
                            <th>id<hr></th>
                            <th>title<hr></th>
                            <th>author<hr></th>
                            <th>price<hr></th>
                            <th>ISBN<hr></th>
                            <th>Genres<hr></th>
                            <th>Action<hr></th>
                        </tr>
                   </div>

                         <?php
                         $callingbooks = mysqli_query($connect,"select * from books");
                         while($row = mysqli_fetch_array($callingbooks)){
                             ?>

                             <tr>
                                 <td><?= $row['id'];?>.</td>
                                 <td><?= $row['title'];?></td>
                                 <td><?= $row['author'];?></td>
                                 <td><?= $row['price'];?></td>
                                 <td><?= $row['isbn'];?></td>
                                 <td><?= $row['genre_id'];?></td>
                                 <td>
                                     <a href="manageBooks.php?id=<?= $row['id'];?>" class="btn btn-danger">X</a>
                                     <a href="editBook.php?edit=<?= $row['id'];?>" class="btn btn-info">edit</a>
                                     <a href="../view.php?book_id=<?= $row['id'];?>" class="btn btn-success">view</a>

                         </td>
                         </tr>

                         <?php } ?>
                         </table>
                      </div>
                        
                        </div>
                         </div>
                         </div>


                         <?php
                         
                         if(isset($_GET['id'])){
                             $id=$_GET['id'];
                             $query=mysqli_query($connect, "DELETE from books where id='$id'");
                             if($query){
                                echo "<script>window.open('manageBooks.php','_self')</script>";
                         }
                      } 
                         ?>

</body>
</html>