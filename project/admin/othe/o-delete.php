<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete-Product(Other)</title>
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
            $o_id=$_POST['o_id'];
        
            $sql= "DELETE FROM `otherproducts` WHERE o_id='$o_id'";
                
            if (mysqli_query($conn,$sql)) {
                $dbs= "data deleted in database successfully";
            }else{
                $dbs= "ERROR:". mysqli_error($conn);
            }
            }
        ?>
    </p>
    <nav>
    <a href="../admin.php">HOME</a>
        <a href="../othe/o-add.php">ADD-PRODUCT</a>
        <a href="../othe/o-edit.php">EDIT-PRODUCT</a>
        <a href="../othe/o-delete.php">DELETE-PRODUCT</a>
        <a href="../order-details.php">ORDER-DETAILS</a>
        <a href="../../login.php">LOGOUT</a>
    </nav>
    <br>
    <hr> 
    <br><br>
    <div class="indiv">
        <form action="#" method="post">
        <h2>Delete A Product</h2><hr>
        <br><br>
        <label for="o_id">O-ID</label><input type="text" name="o_id" required><br><br>
        <button type="submit" name="sub">Delete Product</button>
        <br><br><br>
        <?php echo"$dbs";?>
        </form>

    <!-- data fecthing in database to web page code -->
    <p>
        <?php
            $sql="SELECT * FROM otherproducts";
            $res=$conn->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo'
                    <div class="container">
                    <div class="pro">
                    <table border="5px">
                    <tr>
                    <th>O_id</th>
                    <td>&nbsp;&nbsp;'. $row['o_id'] .'</td></tr>
                    <tr>
                    <th>Product Name</th>
                    <td>&nbsp;&nbsp;'. $row['product_name'] .'</td>
                    </tr>
                    <tr>
                    <th>Price</th>
                    <td>&nbsp;&nbsp;'. $row['price'].'</td>
                    </tr>
                    <tr>
                    <th></th>
                    <td>&nbsp;&nbsp;'. $row['p_1'].'</td>
                    </tr>
                    <tr>
                    <th></th>
                    <td>&nbsp;&nbsp;'. $row['p_2'].'</td>
                    </tr>
                    <tr>
                    <th></th>
                    <td>&nbsp;&nbsp;'. $row['P_3'].'</td>
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

   <!-- css code -->
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