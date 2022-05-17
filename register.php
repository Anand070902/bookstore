<?php include "dbConfig.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <?php include "header.php"; ?>
                 
                    <div class="container mt-5">
                      <div class="row">
                    <div class="col-6 mx-auto">
                    <div class="card">
                   <div class="card-header">Register</div>
                   <div class="card-body">
                       <form action="" method="post">
                           <div class="mb-2">
                               <div class="form-floating">
                                   <input type="text" placeholder="name" name="name" class="form-control">
                                   <label for="">Name</label>
                               </div>
                           </div>
                           <div class="mb-2">
                               <div class="form-floating">
                                   <input type="text" placeholder="email" name="email" class="form-control">
                                   <label for="">Email</label>
                               </div>
                           </div>
                           <div class="mb-2">
                               <div class="form-floating">
                                   <input type="text" placeholder="contact" name="contact" class="form-control">
                                   <label for="">Contact</label>
                               </div>
                           </div>
                           <div class="mb-2">
                               <div class="form-floating">
                                   <input type="password" placeholder="password" name="password" class="form-control">
                                   <label for="">Password</label>
                               </div>
                           </div>
                           <div class="mb-2">
                                   <input type="submit" name="create" class="btn btn-success w-100" value="Login">
                           </div>
                       </form>
                    </div>
    </div>
</div>
                  
<?php
   if (isset($_POST['create'])){
       $name = $_POST['name'];
       $contact = $_POST['contact'];
       $email = $_POST['email'];
       $password = $_POST['password'];

         $query = mysqli_query($connect,"insert into accounts (name,contact,email,password) value('$name','$contact','$email','$password')");

         if($query){
             echo "<script>window.open('login.php','_self')</script>";
         }
   }
   ?>
</body>
</html>