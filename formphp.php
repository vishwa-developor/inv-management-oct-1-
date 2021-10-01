<?php
$conn = mysqli_connect("localhost", "root", "", "customer");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name1=$_REQUEST['name'];
$mail1=$_REQUEST['mail'];
$password1=$_REQUEST['pass'];

$sql = "INSERT INTO user (name,mail,password) VALUES ('$name1','$mail1','$password1')";
if(mysqli_query($conn, $sql)){
    echo "<h3>data stored in a database successfully." . " Please browse your localhost php my admin" . " to view the updated data</h3>"; 
} 
else{
    echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
}
  
// Close connection
mysqli_close($conn);
          
?>