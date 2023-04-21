<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="icon" href="images/apple logo.png">
    <link rel="stylesheet" href="./css/account.css">
</head>
<body>
    <?php session_start(); ?>
    <nav>
        <a href="./homepage/home.php">HOME</a>
        <a href="./homepage/p-mobile/mobile.php">MOBILES</a>
        <a href="./homepage/p-laptop/laptop.php">LAPTOPS</a>
        <a href="./homepage/p-acc/acc.php">OTHER-PRODUCTS</a>
        <a href="./login.php">LOGOUT</a>
        <div class="navr">
            <a href="./cart.php">MyCart&#128722;</a>
            <a href="">My&#1234;ccount</a>
        </div>
    </nav>
    <br>
    <hr>  
    <br>
    <br>
    <?php
    $conn=new mysqli("localhost","root","","applestore");
     // checking connection
     if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection error");
    }else{
        // echo "connected successfully";
    }

    ?>
    <div class="first">
        <div class="second">
            <h3><u>YOUR INFO</u></h3>
            <fieldset>
                <legend>NAME</legend>
                <?php echo $_SESSION["sname"];?>
            </fieldset>
            <br>
            <fieldset>
                <legend>EMAIL</legend>
                <?php echo $_SESSION["semail"];?>
            </fieldset>
            <br>
            <fieldset>
                <legend>NUMBER</legend>
                <?php echo $_SESSION["spnumber"];?>
            </fieldset>
            <br>
            <fieldset>
                <legend>ADDRESS</legend>
                <?php 
                    $mail=$_SESSION["spnumber"];
                    $sql="SELECT * FROM orderdetails WHERE mnumber=$mail";
                    $res=$conn->query($sql);
                    if($res->num_rows>0)
                    {
                        if($row=$res->fetch_assoc())
                        {
                        echo'
                        <b>'.$row['address'].'</b>,<br>
                        <b>'.$row['street'].'</b>,<br>
                        <b>'.$row['city'].'</b>,<br>
                        <b>'.$row['state'].'</b>,<br>
                        <b>'.$row['pincode'].'</b>';
                    }
                }else{
                    echo"Your Order Address Is Stored Here.!"; 
                }
                ?>
            </fieldset>
            <br>
            <fieldset>
                <button><a href="./index.php">LOGOUT</a></button>
            </fieldset>
        </div>
    </div>
</body>
</html>