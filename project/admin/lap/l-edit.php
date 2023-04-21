<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Product(Laptop)</title>
    <link rel="icon" href="../../images/apple logo.png">
</head>
<body>
    <p>
        <?php
            $conn=new mysqli("localhost","root","","applestore");
        ?>
                <!-- table datas insert to datbase code -->
        <?php
             error_reporting(E_ERROR | E_PARSE);

            if (isset($_POST['sub'])){
            // from values stored in database
            $l_id=$_POST['l_id'];
            $pname=$_POST['pname'];
            $price=$_POST['price'];
            $ram=$_POST['ram'];
            $ssd=$_POST['ssd'];
            $pro=$_POST['processer'];
            $display=$_POST['display'];

        
            $sql= "UPDATE laptops SET product_name='$pname',price='$price',ram='$ram',ssd='$ssd',processor='$pro',display='$display' WHERE l_id='$l_id' ";
                
            if (mysqli_query($conn,$sql)) {
                $dbs= "data Edited in database successfully";
            }else{
                $dbs= "ERROR:". mysqli_error($conn);
            }
            }
        ?>
    </p>
    <nav>
        <a href="../admin.php">HOME</a>
        <a href="../lap/l-add.php">ADD-LAPTOP</a>
        <a href="../lap/l-edit.php">EDIT-LAPTOP</a>
        <a href="../lap/l-delete.php">DELETE-LAPTOP</a>
        <a href="../order-details.php">ORDER-DETAILS</a>
        <a href="../../login.php">LOGOUT</a>
    </nav>
    <br>
    <hr> 
    <br><br>
    <div class="indiv">
        <form action="#" method="post">
        <h2>Edit A Mobile Details</h2><hr>
        <br><br>
        <h3><u>Enter A Editing Laptop L_id</u></h3>
        <label for="l_id">L_id:</label><input type="text" name="l_id" required>
        <br><br>
        <br><br>
        <h3><u>Enter The Editing Details</u></h3>
        <label for="name">PRODUCT_NAME:</label><input type="text" name="pname" required><br><br>
        <label for="name">PRICE:</label><input type="text" name="price"required><br><br>
        <label for="name">RAM:</label><input type="text" name="ram" required><br><br>
        <label for="name">SSD:</label><input type="text" name="ssd" required><br><br>
        <label for="name">PROCESSER:</label><input type="text" name="processer" required><br><br>
        <label for="name">DISPLAY:</label><input type="text" name="display" required><br><br>
        <button type="submit" name="sub">Edit Laptop Details</button>
        <br><br><br>
        <?php echo"$dbs";?>
        </form>
    </div>
    <!-- data fecthing in database to web page code -->
    <p>
        <?php
            $sql="SELECT * FROM laptops";
            $res=$conn->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo'
                    <div class="container">
                    <div class="pro">
                    <table border="5px">
                    <tr>
                    <th>L_id</th>
                    <td>&nbsp;&nbsp;'. $row['l_id'] .'</td></tr>
                    <tr>
                    <th>Product Name</th>
                    <td>&nbsp;&nbsp;'. $row['product_name'] .'</td>
                    </tr>
                    <tr>
                    <th>Price</th>
                    <td>&nbsp;&nbsp;'. $row['price'].'</td>
                    </tr>
                    <tr>
                    <th>Ram</th>
                    <td>&nbsp;&nbsp;'. $row['ram'].'</td>
                    </tr>
                    <tr>
                    <th>Ssd</th>
                    <td>&nbsp;&nbsp;'. $row['ssd'].'</td>
                    </tr>
                    <tr>
                    <th>Processor</th>
                    <td>&nbsp;&nbsp;'. $row['processor'].'</td>
                    </tr>
                    <tr>
                    <th>Display</th>
                    <td>&nbsp;&nbsp;'. $row['display'].'</td>
                    </tr>
                    </table>
                    </div>
                    </div>
                    <br>
                    <br>
                    ';
                }
            }
        ?>
   </p>
   <style>
       
       body {
            background-image: url(../../images/background.jpg);
            background-size: 100%;
        }
        /* nav */
        nav {
            word-spacing: 40px;
            font-size: large;
            padding-top: 20px;
            padding-left: 20px;
        }

        nav>a {
            color: antiquewhite;
            text-decoration: none;
        }

        nav>a:hover {
            color: black;
            padding: 3px;
            background-color: antiquewhite;
            border-radius: 10px;
        }

        .container {
            display: grid;
            padding-left: 2%;
            grid-auto-flow: column;
        }

        .pro {
            color: antiquewhite;
            text-transform: uppercase;
            width: fit-content;
            text-align: center;
            padding: 20px;
            /* bg color */
            background: rgba(255, 255, 255, 0.11);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(9.6px);
            -webkit-backdrop-filter: blur(8.6px);
            border: 2px solid rgba(90, 89, 89, 0.89);
            border-radius: 20px;
        }
        .indiv{
            position: sticky;
            padding-right: 45px;
        }
        form{
            color: antiquewhite;
            float: right;
            padding: 20px;
            text-align: center;
            
              /* bg color */
            background: rgba(255, 255, 255, 0.11);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(9.6px);
            -webkit-backdrop-filter: blur(8.6px);
            border: 2px solid rgba(90, 89, 89, 0.89);
            border-radius: 20px;

        }
    </style>
</body>
</html>