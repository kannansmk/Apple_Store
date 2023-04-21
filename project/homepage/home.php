<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME-PAGE</title>
    <link rel="icon" href="../images/apple logo.png">
    <link rel="stylesheet" href="../css/homee.css">
</head>
<body>
    <p>
        <?php
        session_start();
        if(isset($_SESSION["user"])){
        ?>
    </p>
    <nav>
        <a href="home.php">HOME</a>
        <a href="p-mobile/mobile.php">MOBILES</a>
        <a href="p-laptop/laptop.php">LAPTOPS</a>
        <a href="p-acc/acc.php">OTHER-PRODUCTS</a>
        <a href="../login.php">LOGOUT</a>
        <div class="navr">
            <a href="../cart.php">MyCart&#128722;</a>
            <a href="../account.php">My&#1234;ccount</a>
        </div>
    </nav>
    <br>
    <hr>  
    <br>
    <br>
    <div class="container">
        <div class="cat">
            <b><u>MOBILES</u></b>
            <br>
            <br>
            <img src="../images/iPhone-14-Pro-Max.png" alt="IPHONE 14 PRO MAX">
            <br>
            <button type="submit"><a href="p-mobile/mobile.php">VISIT NOW!</a></button>
        </div>
        <div class="cat">
            <b><u>LAPTOPS</u></b>
            <br><br>
            <br><br>
            <img src="../images/laptop full size.png" alt="IPHONE 14 PRO MAX">
            <br><br>
            <br>
            <button type="submit"><a href="p-laptop/laptop.php">VISIT NOW!</a></button>
        </div>
        <div class="cat">
            <b><u>OTHER PRODUCTS</u></b>
            <br><br>
            <br><br>
            <img src="../images/apple watch.png" alt="IPHONE 14 PRO MAX">
            <br><br>
            <br><br><br>
            <button type="submit"><a href="p-acc/acc.php">VISIT NOW!</a></button>
        </div>
    </div>
    <P>
        <?php
        }else{
            header("location:../index.php");
        }
        ?>
    </P>
</body>
</html>