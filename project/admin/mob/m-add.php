<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Product(Mobile)</title>
    <link rel="icon" href="../../images/apple logo.png">
</head>
<body>
    <p>
        <!-- connection code,,code to database -->
        <?php
                $conn=new mysqli("localhost","root","","applestore")
        ?>
        <!-- table datas insert to datbase code -->
        <?php
             error_reporting(E_ERROR | E_PARSE);
            if (isset($_POST['sub'])){
                // from values stored in database
                $pname=$_REQUEST['pname'];
                $price=$_REQUEST['price'];
                $ramrom=$_REQUEST['ram_rom'];
                $pro=$_REQUEST['processer'];
                $rcam=$_REQUEST['rcamera'];
                $fcam=$_REQUEST['fcamera'];


                $sql= "INSERT INTO mobiles(`p_id`, `product_name`, `price`, `ram_rom`, `processer`, `rear_camera`, `front_camera`) VALUES ('','$pname','$price','$ramrom','$pro','$rcam','$fcam')";


                if (mysqli_query($conn,$sql)) {
                    $dbs= "data stored in database successfully";
                }else{
                    $dbs= "ERROR:". mysqli_error($conn);
                }
            }
        ?>
    </p>
    <nav>
        <a href="../admin.php">HOME</a>
        <a href="../mob/m-add.php">ADD-MOBILES</a>
        <a href="../mob/m-edit.php">EDIT-MOBILES</a>
        <a href="../mob/m-delete.php">DELETE-MOBILES</a>
        <a href="../order-details.php">ORDER-DETAILS</a>
        <a href="../../login.php">LOGOUT</a>
    </nav>
    <br>
    <hr> 
    <br><br>
    <div class="indiv">
        <form action="#" method="post">
        <h2>Add A New Mobile</h2><hr>
        <br><br>
        <label for="name">PRODUCT_NAME:</label><input type="text" name="pname" required><br><br>
        <label for="name">PRICE:</label><input type="text" name="price"required><br><br>
        <label for="name">RAM_ROM:</label><input type="text" name="ram_rom" required><br><br>
        <label for="name">PROCESSER:</label><input type="text" name="processer" required><br><br>
        <label for="name">REAR_CAMERA:</label><input type="text" name="rcamera" required><br><br>
        <label for="name">FRONT_CAMERA:</label><input type="text" name="fcamera" required><br><br>
        <button type="submit" name="sub">Add Mobile</button>
        <br><br><br>
        <?php echo"$dbs";?>
        </form>
    </div>
    <!-- data fecthing in database to web page code -->
    <p>
        <?php
            $sql="SELECT * FROM mobiles";
            $res=$conn->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo'
                    <div class="container">
                    <div class="pro">
                    <table border="5px">
                    <tr>
                    <th>M_id</th>
                    <td>&nbsp;&nbsp;'. $row['p_id'] .'</td></tr>
                    <tr>
                    <th>Product Name</th>
                    <td>&nbsp;&nbsp;'. $row['product_name'] .'</td>
                    </tr>
                    <tr>
                    <th>Price</th>
                    <td>&nbsp;&nbsp;'. $row['price'].'</td>
                    </tr>
                    <tr>
                    <th>Ram_Rom</th>
                    <td>&nbsp;&nbsp;'. $row['ram_rom'].'</td>
                    </tr>
                    <tr>
                    <th>Processer</th>
                    <td>&nbsp;&nbsp;'. $row['processer'].'</td>
                    </tr>
                    <tr>
                    <th>Rear_camera</th>
                    <td>&nbsp;&nbsp;'. $row['rear_camera'].'</td>
                    </tr>
                    <tr>
                    <th>Front_camera</th>
                    <td>&nbsp;&nbsp;'. $row['front_camera'].'</td>
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
            background-size:cover;
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