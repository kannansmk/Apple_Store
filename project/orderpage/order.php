<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDER COMPLETE</title>
    <link rel="icon" href="../images/apple logo.png">
    <link rel="stylesheet" href="../css/order.css">
</head>
<body>
<nav>
        <?php
        session_start();
        if(isset($_SESSION["user"])){
        ?>
        <a href="../homepage/home.php">HOME</a>
        <a href="../homepage/p-mobile/mobile.php">MOBILES</a>
        <a href="../homepage/p-laptop/laptop.php">LAPTOPS</a>
        <a href="../homepage/p-acc/acc.php">OTHER-PRODUCTS</a>
        <a href="../login.php">LOGOUT</a>
        <div class="navr">
            <a href="../cart.php">MyCart&#128722;</a>
            <a href="../account.php">My&#1234;ccount</a>
        </div>
    </nav>
    <br>
    <hr> 
        <div class="container">
            <div class="formdiv">
               <h1><span>Your Order Is Placed...&#10004;</span></h1>
               <button><a href="../homepage/home.php">BACK</a></button>
            </div>
        </div>
</body>
        <?php
        }else{
            header("location:../index.php");
        }
        ?>
</html>