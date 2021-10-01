<?php      
        include('connection.php');  
        $userid = $_POST['delid'];  
        $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $userid = stripcslashes($userid);  
        $password = stripcslashes($password);  
        $userid = mysqli_real_escape_string($con, $userid);  
        $password = mysqli_real_escape_string($con, $password);  
        if(empty($userid) && empty($password)) echo"<script> alert('Please fill the fields')</script>";
        else if(empty($userid) || empty($password))
        {
            if(empty($userid) && !empty($password)) echo"<script> alert('Please enter the id')</script>";
            else echo"<script> alert('Please enter the password')</script>";
        }
        else
        {
            $sql = "select *from delTeam where id = '$userid' and password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                echo "<script> alert('Login Successfull !')</script>";  
                header("location:deldashboard.php");
                exit;
            }  
            else{  
                echo "<script> alert('Login Failed !')</script>"; 
                echo "Login Failed !" ;
                exit;
            }
        }
?>  