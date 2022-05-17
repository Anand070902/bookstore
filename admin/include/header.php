<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
                <a href="" class="navbar-brand">Admin Panel | Bookstore</a>
                <form action="" class="d-flex input-group">
                        <input type="search" name="search" class="form-control" size="60">
                        <input type="submit" name="find" class="btn btn-success">
                </form>
         <ul class="navbar-nav">
             <li  class="nav-item"><a href="index.php" class="nav-link text-success"><b>Home</b></a></li>
             <?php
             if(isset($_SESSION['user'])): ?>
             <li  class="nav-item"><a href="filter.php"class="nav-link text-success "><b>filter</b></a></li>
             <li  class="nav-item"><a href="insert.php" class="nav-link text-success"><b>Post</b></a></li>
             <li  class="nav-item"><a href="logout.php" class=" btn btn-danger"><b>Logout</b></a></li>
                  <?php else: ?>
                    <li class="nav-item"><a href="login.php" class="nav-link text-success"><b>Login</b></a></li>
                  <li class="nav-item"><a href="register.php" class="nav-link text-success"><b>Register</b></a></li>
             <?php endif; ?>
            </ul>
          </div>
</nav>

</nav>