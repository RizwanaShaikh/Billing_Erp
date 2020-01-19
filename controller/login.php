<?php
	session_start();
	require_once('../Db/dbconfig.php');


    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "select * from admin where email = '".$username."' and password = '".$password."'";
        $queryrun = mysqli_query($con, $query);
        if(mysqli_num_rows($queryrun) > 0)
        {
            $_SESSION['user_name'] = $username;
            echo"<script>window.location.href='../panel/index.php';</script>";
        }
        else
        {
            echo "<script>alert('Invalid Username Or Password'); window.location.href='../index.php';</script>";
        }
    }
    mysqli_close($con);
?>