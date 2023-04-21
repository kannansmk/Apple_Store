<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDER NOW</title>
    <link rel="icon" href="../images/apple logo.png">
    <link rel="stylesheet" href="../css/order.css">
</head>
<body>
    <nav>
        <a href="../admin/admin.php">HOME</a>
        <a href="../login.php">LOGOUT</a>
    </nav>
    <br>
    <hr> 
    <br><br>
    <br><br>
    <div class="container1">
        <div class="formdiv1">
            <h2><b>ORDER DETAILS</b></h2><hr>
            <?php
                error_reporting(E_ERROR | E_PARSE);
                // create connection
                $conn = new mysqli("localhost","root","","applestore");

                // checking connection
                if($conn->connect_error){
                    echo "$conn->connect_error";
                    die("Connection error");
                }else{
                    // echo "connected successfully";
                }

                $sql="SELECT * FROM orderdetails";
                $res=$conn->query($sql);
                if($res->num_rows>0){
                    while($row=$res->fetch_assoc()){
                        echo'<br>
                        <form method="post">
                        <table>
                        <table border="5px">
                        <tr><th>Order_id </th>
                        <td>&nbsp;&nbsp;'. $row['or_id'] .'</td></tr>
                        <tr><th>Name </th>
                        <td>'. $row['name'] .'</td></tr>
                        <tr><th>Customer Email</th>
                        <td>'. $row['email'] .'</td></tr>
                        <tr><th>Mobile-number </th>
                        <td>'. $row['mnumber'] .'</td></tr>
                        <tr><th>Product-Name </th>
                        <td>'. $row['product_name'] .'</td></tr>
                        <tr><th>Price </th>
                        <td>'. $row['price'] .'</td></tr>
                        <tr><th>Quentity </th>
                        <td>'. $row['qty'] .'</td></tr>
                        <tr><th>Address</th><td>'.$row['address'].',<br>'.$row['street'].',<br>'.$row['city'].','.$row['state'].',<br>'.$row['pincode'].'</td></tr>
                        <tr><th>Delivery Date</th>
                        <td>'.$row['delivery_date'].'</td></tr>
                        </table>
                        </form>
                        <br><br>';
                    }
                }   
            ?>
        </div>
    </div>


        
        <?php
            if(isset($_POST['sub'])){
                $order=$_POST['order_id'];
                
                $sql= "DELETE FROM `orderdetails` WHERE or_id='$order'";
                
                if (mysqli_query($conn,$sql)) {
                    $dbs= "success";
                }else{
                    $dbs= "ERROR:". mysqli_error($conn);
                }
            }
            ?>
            
                    <div class="delete">
                    <form class="innerdelete" action="#" method="post">
                    <h2>Completed Order</h2><hr>
                    <br><br>
                    <label for="order_id">Order-ID</label><input type="text" name="order_id"><br><br>
                    <button type="submit" name="sub">Submit</button>
                    <br><br>
                    <?php echo"$dbs";?>
                </form>

    </body>
    </html>