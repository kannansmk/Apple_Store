<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Carts</title>
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="icon" href="images/apple logo.png">
</head>
<body>
    <p>
    <?php
        session_start();
        if(isset($_SESSION["user"])){
    ?>
    </p>
    <nav>
        <a href="./homepage/home.php">HOME</a>
        <a href="./homepage/p-mobile/mobile.php">MOBILES</a>
        <a href="./homepage/p-laptop/laptop.php">LAPTOPS</a>
        <a href="./homepage/p-acc/acc.php">OTHER-PRODUCTS</a>
        <a href="./login.php">LOGOUT</a>
        <div class="navr">
            <a href="">MyCart&#128722;</a>
            <a href="./account.php">My&#1234;ccount</a>
        </div>
    </nav>
    <br>
    <hr>  
    <br>
    <br>
    <div class="outer">

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

            $sql="SELECT * FROM orderdetails WHERE email='{$_SESSION["email"]}'";
            $res=$conn->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo'<br>
                    <form method="post">
                    <table>
                    <table border="5px">
                    <tr><th>order_id</th><td>'.$row['or_id'].'</td></tr>
                    <tr><th>Product-Name </th>
                    <td>'. $row['product_name'] .'</td></tr>
                    <tr><th>Price </th>
                    <td>'. $row['price'] .'</td></tr>
                    <tr><th>Quentity </th>
                    <td>'. $row['qty'] .'</td></tr>
                    <tr><th>Name </th>
                    <td>'. $row['name'] .'</td></tr>
                    <tr><th>Mobile-number </th>
                    <td>'. $row['mnumber'] .'</td></tr>
                    <tr><th>Address</th>
                    <td>'.$row['address'].',<br>'.$row['street'].',<br>'.$row['city'].','.$row['state'].',<br>'.$row['pincode'].'</td></tr>
                    <tr><th>Delivery Date</th>
                    <td>'.$row['delivery_date'].'</td></tr>
                    <tr><th><input type="text" name="id" placeholder="Enter Order Id"></th>
                    <td><button type="submit" name="submit">Remove This Order</button></td></tr>
                    </table>
                    </form>';

                    if(isset($_POST['submit'])){
                        $id=$_POST['id'];
                        $sql= "DELETE FROM `orderdetails` WHERE or_id=$id";
                        if (mysqli_query($conn,$sql)) {
                            $dbs= "success";
                        }else{
                            $dbs= "ERROR:". mysqli_error($conn);
                        }
                    }
                }
            }else{
                echo"<h2>Your Cart Is Empty!</h2>";
            }
        ?>
    </div>
</body>
    <?php
    }else{
        header("location:./login.php");
    }
    ?>
</html>