<?php
echo"Login Successfull !"."<br>";
echo "<h1> INVENTORY DASHBOARD </h1>";
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
            
            </form>
            
        </div>
        <div class="insertOrders">
            <form method="post" action="" >
                Order Id : <input type="number" name="oId" placeholder="order id"><br>
                Customer Id : <input type="number" name="cId" placeholder="customer id"><br>
                Customer Name : <input type="text" name="cName" placeholder="customer name"><br>
                Product Id : <input type="number" name="pId" placeholder="product id"><br>
                Product Name : <input type="text" name="pName" placeholder="product name"><br>
                Product type : <input type="text" name="pType" placeholder="product type"><br>
                Date in : <input type="date" name="inDate" placeholder="date in"><br>
                Date out : <input type="date" name="outDate" placeholder="date out"><br>
                Expiry Date : <input type="date" name="expDate" placeholder="exp date"><br>
                Delivery Agent id: <input type="number" name="dlagId" placeholder="Delivery agent id"><br>
                Damaged ? :<input type="boolval" name="damaged" placeholder="damaged?"><br>
                Status: <input type="text" name="status" placeholder="status"><br>
                <button type="submit" name="insertOrders" value="insert">insert</button><br>
            </form>
        </div>
        </div class="insertProducts">
            <form action="" method="post">
                Product Name: <input type="text" name="pName"><br>
                Product Type: <input type="text" name="pType"><br>
                Product Brand:<input type="text" name="pBrand"><br>
                Price:<input type="number" name="pPrice"><br>
                Available: <input type="text" name="pAvailable"><br>
                <button class="insertProductsBtn" type="submit" name="insertProducts" value="addProduct">add Product</button>
            </form>
        <div>

        
    </body>
</html>
<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "customer"; 
$conn = mysqli_connect("localhost", "root", "", "customer");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
    exit;
}
else 
{
    if(isset($_POST['track']))
    {
        $id=$_POST['orderId'];
        $sql = "SELECT *  FROM orders where o_id='$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
        {
                // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
                echo "customer_id: " . $row["c_id"]. " - Customer Name: " . $row["c_name"]. " p_id :".$row['p_id']." p_name: ".$row['p_name']."p_type: ".$row['p_type']."dlagId: ".$row['dl_ag_id']." Status: " . $row["status"]. "<br>";
            }
        } 
        else 
        {
            echo "0 results";
        } 
    }
    else if(isset($_POST['insertOrders']))
    {
        $oId=$_POST['oId'];
        $cId=$_POST['cId'];
        $cName=$_POST['cName'];
        $pId=$_POST['pId'];
        $pName=$_POST['pName'];
        $pType=$_POST['pType'];
        $inDate=$_POST['inDate'];
        $outDate=$_POST['outDate'];
        $expDate=$_POST['expDate'];
        $dlagId=$_POST['dlagId'];
        $damaged=$_POST['damaged'];
        $status=$_POST['status'];
        $sql="insert into orders values('$oId','$cId','$cName','$pId','$pName','$pType','$inDate','$outDate','$expDate','$dlagId','$damaged','$status')";
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." . " Please browse your localhost php my admin" . " to view the updated data</h3>"; 
        }
        else echo "Inserting  orders failed";
    }
    else if(isset($_POST['insertProducts']))
    {
        $pName=$_POST['pName'];
        $pType=$_POST['pType'];
        $pBrand=$_POST['pBrand'];
        $pPrice=$_POST['pPrice'];
        $pAvailable=$_POST['pAvailable'];
        $sql="insert into products values('$pName','$pType','$pBrand','$pPrice','$pAvailable')";
        if(mysqli_query($conn,$sql))
        {
            echo "<h3>data stored in a database successfully." . " Please browse your localhost php my admin" . " to view the updated data</h3>"; 
        }
        else echo "Inserting Products failed";
    }

}
//mysqli_close($conn);
?>