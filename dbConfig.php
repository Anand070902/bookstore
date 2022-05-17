<?php
$connect = mysqli_connect("localhost","root","","bookstore");
    session_start();


    function isAuth(){
        if(!isset($_SESSION['admin'])){
            echo "<script>window.open('../login.php','_self')</script>";
        }

    }
?>