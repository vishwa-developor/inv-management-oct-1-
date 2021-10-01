<?php
echo"Login Successfull !"."<br>";
echo "<h1> INVENTORY DASHBOARD2 </h1>";
//echo $_POST['id']." welcome";
//include("connection.php");

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css files/invdashboardstyle.css">
    </head>
    <body> 
        <div class="trackOrder">
            <form method="post" action="">
            <input type="number" name="orderId" >
            <button class="trackOrderbtn" type="submit" name="track" value="submit">Track</button><br>
            <?php
               
                
                ///mysqli_close($conn);
            ?>
            </form>
            
        </div>
        <div class="insert">
            <form method="post" action="" >
                Order Id : <input type="number" name="oId" placeholder="order id"><br>
                Customer Id : <input type="number" name="cId" placeholder="customer id"><br>
                Customer Name : <input type="text" name="cName" placeholder="customer name"><br>
                Product Id : <input type="number" name="pId" placeholder="product id"><br>
                Product Name : <input type="text" name="pName" placeholder="product name"><br>
                Product type : <input type="text" name="pType" placeholder="product type"><br>
                Date in : <input type="date" name="inDate" placeholder="date in"><br>
                Date out : <input type="date" name="outdate" placeholder="date out"><br>
                Expiry Date : <input type="date" name="expDate" placeholder="exp date"><br>
                Delivery Agent id: <input type="number" name="dlaId" placeholder="Delivery agent id"><br>
                Damaged ? :<input type="boolval" name="damaged" placeholder="damaged?"><br>
                Status: <input type="text" name="status" placeholder="status"><br>
                <button type="submit" name="insert" value="insert">insert</button><br>
            </form>
        </div>
    </body>
</html>
<?Php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "customer"; 
$conn = mysqli_connect("localhost", "root", "", "customer");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['track'])) $id=$_POST['orderId'];
$sql = "SELECT customer_id, customer_name , status FROM orders where order_id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
    echo "customer_id: " . $row["customer_id"]. " - Name: " . $row["customer_name"]. " Status: " . $row["status"]. "<br>";
}
} else {
    echo "0 results";
}

?>