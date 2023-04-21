<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPTOPS</title>
    <link rel="icon" href="../../images/apple logo.png">
    <link rel="stylesheet" href="../../css/laptop.css">
</head>
<body>
    <p>
        <?php
        session_start();
        if(isset($_SESSION["user"])){
        ?>
    </p>
            <!-- nav bar -->
    <nav>
        <a href="../home.php">HOME</a>
        <a href="../p-mobile/mobile.php">MOBILES</a>
        <a href="">LAPTOPS</a>
        <a href="../p-acc/acc.php">OTHER-PRODUCTS</a>
        <a href="../../login.php">LOGOUT</a>
        <div class="navr">
            <a href="../../cart.php">MyCart&#128722;</a>
            <a href="../../account.php">My&#1234;ccount</a>
        </div>
    </nav>    
    <br>
    <hr>
    <br> 
    <p>
         <?php
             $conn=new mysqli("localhost","root","","applestore")
         ?>
        <?php
            $sql="SELECT * FROM laptops";
            $res=$conn->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo'<table>
                    <div class="container">
                    <div class="pro">
                    <p>'.$row['product_name'].'</p>
                    <img src="../../images/laptop full size.png" alt="laptop">
                    <p>'.$row['price'].'</p>
                    <p><button><a href="view.php?id='.$row['l_id'].'">view details!</a></button></p>
                    </table>
                    <br>
                    <br>
                    </div>
                    </div>';
                }
            }
        }else{
            header("location:../../index.php");
        }
        ?>
    </p>            
</body>
</html> 