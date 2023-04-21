<?php
    // create connection
    $conn=new mysqli("localhost","root","","");
    
    // checking connection
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection error");
    }else{
        echo "connected successfully<br>";
    }
    // creating a database
    $sql="CREATE DATABASE applestore";
    if ($conn->query($sql)===TRUE) {
        echo"Database Create Successfully<br>";
    }else{
        echo"Error Creating Database";
    }


    // create connection
    $conn = new mysqli("localhost","root","","applestore");

    // checking connection
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection error");
    }else{
        echo "connected successfully<br>";
    }

    // creating a database table
    $sql = "CREATE TABLE signup(
        id INT(20)AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30), 
        phonenumber VARCHAR(30),
        email VARCHAR(30),
        password VARCHAR(30),
        conpassword VARCHAR(30)
        )";

    if ($conn->query($sql) === TRUE) {
        echo "Sign-up Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // creating a table in database for a mobile product details
    $sql = "CREATE TABLE mobiles(
        p_id INT(20)AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(30), 
        price VARCHAR(30),
        qty VARCHAR(30),
        ram_rom VARCHAR(30),
        processer VARCHAR(30),
        rear_camera VARCHAR(30),
        front_camera VARCHAR(30)
        )";

    if ($conn->query($sql)=== TRUE) {
        echo "mobiles Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // insert the values for mobiles table
    $sql= "INSERT INTO mobiles(`p_id`, `product_name`, `price`,`qty`,`ram_rom`, `processer`, `rear_camera`, `front_camera`) VALUES 
        ('','iphone 14 pro max','1,38,099 RS','50','8/256GB','A16 Bionic Chip','48MP + 12MP + 12MP +','12MP'),
        ('','iphone 14 pro','1,33,099 RS','50','8/256GB','A16 Bionic Chip','48MP + 12MP + 12MP','12MP'),
        ('','iphone 13 pro','1,29,900 RS','50','8/256GB','A15 Bionic Chip','12MP + 12MP + 12MP','12MP'),
        ('','iphone 13 mini','71,999 RS','50','8/256GB','A15 Bionic Chip','12MP + 12MP','12MP'),
        ('','iphone 12 pro','1,10,099 RS','50','8/256GB','A14 Bionic Chip','12MP + 12MP + 12MP','12MP'),
        ('','iphone 12 mini','55,999 RS','50','8/256GB','A14 Bionic Chip','12MP + 12MP','12MP'),
        ('','iphone 11 pro','1,00,699 RS','50','8/256GB','A13 Bionic Chip','12MP + 12MP + 12MP','12MP'),
        ('','iphone 11','50,099 RS','50','8/256GB','A13 Bionic Chip','12MP + 12MP ','12MP')";

    // check the values are insert or not insert
    if (mysqli_query($conn,$sql)) {
        echo "data stored in database successfully<br>";
    }else{
        echo "ERROR:". mysqli_error($conn);
    }

    // creating a table in database for a laptop product detailss
    $sql = "CREATE TABLE laptops(
        l_id INT(20)AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(30), 
        price VARCHAR(30),
        qty VARCHAR(30),
        ram VARCHAR(30),
        ssd VARCHAR(30),
        processor VARCHAR(30),
        display VARCHAR(30)
        )";

    if ($conn->query($sql) === TRUE) {
        echo "laptops Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // insert the values for laptops table
    $sql = "INSERT INTO laptops(`l_id`, `product_name`, `price`,`qty`,`ram`, `ssd`, `processor`, `display`) VALUES 
        ('','APPLE MACBOOK AIR M2','1,29,990 RS','50','8GB','512GB','M2 CHIP','2560 * 1664 Pixel'),
        ('','APPLE MACBOOK AIR M1','1,12,990 RS','50','16GB','512GB','M1 CHIP','2560 * 1600 Pixel'),
        ('','APPLE MACBOOK M1 MAX','3,29,900 RS','50','32GB','1 TB','M1 MAX CHIP','3456 * 2234 Pixel'),
        ('','APPLE MACBOOK M1 PRO','2,59,900 RS','50','16GB','1 TB','M1 PRO CHIP','3456 * 2234 Pixel'),
        ('','APPLE MACBOOK PRO','1,28,490 RS','50','8GB','512GB','M1 CHIP','2560 * 1600 Pixel'),
        ('','APPLE MACBOOK','94,990 RS','8GB','50','256GB','M1 CHIP','2560 * 1600 Pixel')";

    // check the values are insert or not insert
    if (mysqli_query($conn,$sql)) {
        echo "data stored in database successfully<br>";
    }else{
        echo "ERROR:". mysqli_error($conn);
    }

    // creating a table in database for other products dtails
    $sql = "CREATE TABLE otherproducts(
        o_id INT(20)AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(30), 
        price VARCHAR(30),
        qty VARCHAR(30),
        p_1 VARCHAR(30),
        p_2 VARCHAR(30),
        P_3 VARCHAR(30)
        )";

    if ($conn->query($sql) === TRUE) {
        echo "other products Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // insert the values for other products table
    $sql = "INSERT INTO `otherproducts`(`o_id`, `product_name`, `price`,`qty`,`p_1`, `p_2`, `P_3`) VALUES 
        ('1','APPLE WATCH','37,00 RS','50','OPREATING SYSTEM: WATCH OS','DISPLAY: 368*448 RETINA DISPLAY','INTERNAL MEMORY: 32GB'),
        ('2','AIRPODS PRO','22,810 RS','50','MODEL: MLWK3HN/A','HEADPHONE DESIGN: EARBUDS','BLUETOOTH VERSION: V5.0'),
        ('3','AIRPODS','13,990 RS','50','MODEL: MRXJ2HN/A','HEADPHONE DESIGN: EARBUDS','BLUETOOTH VERSION: V5.0'),
        ('4','POWER ADAPTOR','6,999 RS','50','MODEL: MD506HN/A','VOLTAGE: 85W','CABLE TYPE: LIGHTING CABLE'),
        ('5','LIGHTING CABLE','1,800 RS','50','CONNECTOR: USB TYPE A','CABLE LENGTH: 1METER','SUTABILE FOR: MOBILES'),
        ('6','POWER BANK','10,755 RS','50','TYPE: WIRE','CAPACITY: 14000 MAH','BATTERY: LITHIUM-ION')";

    // check the values are insert or not insert
    if (mysqli_query($conn,$sql)) {
        echo "data stored in database successfully<br>";
    }else{
        echo "ERROR:". mysqli_error($conn);
    }

    // creating a table in database for order dtails
    $sql = "CREATE TABLE orderdetails(
        or_id INT(20)AUTO_INCREMENT PRIMARY KEY,
        qty VARCHAR(30), 
        name VARCHAR(30), 
        mnumber VARCHAR(30),
        delivery_date VARCHAR(30),
        address VARCHAR(30),
        street VARCHAR(30),
        city VARCHAR(30),
        state VARCHAR(30),
        pincode VARCHAR(30),
        product_name VARCHAR(30),
        price VARCHAR(30),
        email VARCHAR(30)
        )";


    if ($conn->query($sql) === TRUE) {
        echo "order details Table created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error;
    }


    // close connection
    $conn->close();

?>