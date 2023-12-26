<?php
    session_start();
    require("../includes/database_connect.php");

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST["full_name"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $college=$_POST["college_name"];

        $user_id=$_SESSION["user_id"];
        
        $sql="UPDATE `users` SET `email` = '$email', `full_name` = '$name', `phone` = '$phone', `college_name` = '$college' WHERE `users`.`id` = '$user_id'";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            echo("<script>alert('Email already in use, Please use another email')</script>");
            echo("<script>location.href = 'http://localhost/rentnow/dashboard.php'</script>");
        }
        else
        {
            echo("<script>location.href = 'http://localhost/rentnow/dashboard.php'</script>");
        }

    }
    mysqli_close($conn);
?>