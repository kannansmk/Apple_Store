<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAILS</title>
    <link rel="icon" href="../../images/apple logo.png">
    <link rel="stylesheet" href="../../css/acc.css">
</head>
<body>
 <p>
        <?php
             $conn=new mysqli("localhost","root","","applestore");
            session_start();
            if(isset($_SESSION["user"])){
        ?>
 </p>
            <!-- nav bar -->
    <nav>
        <a href="../home.php">HOME</a>
        <a href="../p-mobile/mobile.php">MOBILES</a>
        <a href="../p-laptop/laptop.php">LAPTOPS</a>
        <a href="">OTHER-PRODUCTS</a>
        <a href="../../login.php">LOGOUT</a>
        <div class="navr">
            <a href="../../cart.php">MyCart&#128722;</a>
            <a href="../../account.php">My&#1234;ccount</a>
        </div>
    </nav>    
    <br>
    <hr>
    <br> 
    <h2 style="color:antiquewhite;">Add To Cart</h2>
 <div class="container">
    <div class="pro">
    <p>
        <?php
            $sql="SELECT * FROM otherproducts WHERE o_id='{$_GET["id"]}'";
            $res=$conn->query($sql);
            if($res->num_rows>0)
            {
                echo '<form action="'.$_SERVER["REQUEST_URI"].'" method="post">';
                if($row=$res->fetch_assoc())
                {
                echo  '
                    <div>    
                    <h3><strong>'. $row['product_name'] .'</strong></h3>
                    <p><img src="../../images/apple logo.png" alt="img"></p>
                    <h3>price : '. $row['price'].' </h3>
                    <h4>Available Quentity:&nbsp;'.$row['qty'].'&nbsp;LEFT</h4>
                    <hr>
                    <h2><u>Specification</u></h2>
                    <p>'. $row['p_1'] .'</p>
                    <p>'. $row['p_2'] .'</p>
                    <p>'. $row['P_3'] .'</p>
                    </div>';
                }
            }
            ?>
                </div>
            </div>
        </p>        
        
        <div class="first">
        <div class="second">
        <h2><u>order now</u></h2><hr>
            <p>ENTER QUANTIY<input type="text"  placeholder="QUANTITY" name="qty" pattern="\d{1,2}" required></p>
			<p>ENTER YOUR NAME<input type="text"  placeholder="NAME" name="name" required></p>
			<p>MOBILE NUMBER<input type="text"  placeholder="MOBILE NUMBER" name="mnumber" required></p>
			<p>HOUSE NO<br><input type="text"  placeholder="HOUSE NO/BUILDING NAME" name="house" required></p>
			<p>STREET<br><input type="text"  placeholder="ROAD NAME/AREA/STREET" name="road" required></p>
			<p>CITY<br><input type="text"  placeholder="CITY" name="city" required></p>
			<p>STATE<br><input type="text"  placeholder="STATE" name="state" required></p>
			<p>PINCODE<br><input type="text"  placeholder="PINCODE" name="pin" required></p>
            <p><input type="hidden"  name="pname" value="'. $row['product_name'] .'"></p>
            <p><input type="hidden"  name="price" value="'. $row['price'] .'"></p>
            <p><input type="hidden"  name="email" value="'. $_SESSION['email'] .'"></p>
            <p><button name="addCart"><a>Add To Cart</a></button></p>
    <p>
        <?php
                echo '</form>';
            if(isset($_POST['addCart'])){
                $qty=$_POST['qty'];
                $name=$_POST['name'];
                $mnumber=$_POST['mnumber'];
				$house=$_POST['house'];
				$road=$_POST['road'];
				$city=$_POST['city'];
				$state=$_POST['state'];
				$pin=$_POST['pin'];
				$pname=$row['product_name'];
				$price=$row['price'];
                $email=$_SESSION['email'];
                // random delivery date create
                $date=mt_rand(1,time());
                $randomdate=date('d',$date);
                $dd= $randomdate.'-'.date("m-y");

                $sql="INSERT INTO orderdetails VALUES ('','$qty','$name','$mnumber','$dd','$house','$road','$city','$state','$pin','$pname','$price','$email')";
                if (mysqli_query($conn,$sql)) {
                    echo "data stored in database successfully";
                    header("location:../../orderpage/order.php");
                }else{
                    echo "ERROR:". mysqli_error($conn);
                }
			}

            if(isset($_POST['addCart'])){
                $qty=$_POST['qty'];
                $qty2=$row['qty'];
                $fqty=$qty2-$qty;
    
                $sql="UPDATE otherproducts SET qty='$fqty' WHERE o_id ='{$_GET["id"]}'";
                
                if (mysqli_query($conn,$sql)) {
                    echo "data Edited in database successfully";
                }else{
                    echo "ERROR:". mysqli_error($conn);
                }
            }
        ?>
    </p>
         </div>
    </div>
     <P>
        <?php
        }else{
            header("location:../../index.php");
        }
        ?>
    </P>    
</body>
</html