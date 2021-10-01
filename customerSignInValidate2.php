<?php      
    include('connection.php');  
    $usermail = $_POST['mail'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $usermail = stripcslashes($usermail);  
        $password = stripcslashes($password);  
        $usermail = mysqli_real_escape_string($con, $usermail);  
        $password = mysqli_real_escape_string($con, $password);  
        if(empty($usermail) && empty($password)) echo"<script> alert('Please fill the fields')</script>";
        else if(empty($usermail) || empty($password))
        {
            if(empty($usermail) && !empty($password)) echo"<script> alert('Please enter the id')</script>";
            else echo"<script> alert('Please enter the password')</script>";
        }
        else
        {
            $sql = "select *from user where mail = '$usermail' and password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                echo "<script> alert('Login Successfull !')</script>";  
                header("location:customerdashboard.php");
            }  
            else{  
                echo "<script> alert('Login Failed !')</script>";  
                
                
            }
        }
         
     
?> 
