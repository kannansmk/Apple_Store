<?php

    // create connection
    $conn = new mysqli("localhost","root","","applestore");

    // checking connection
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection error");
    }else{
        // echo "connected successfully";
    }


    // creating a database table
    // $sql = "CREATE TABLE signup(
    //     id INT(20)AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(30), 
    //     phonenumber VARCHAR(30),
    //     email VARCHAR(30),
    //     password VARCHAR(30),
    //     conpassword VARCHAR(30)
    //     )";

    // if ($conn->query($sql) === TRUE) {
    // echo "Sign-up Table created successfully";
    // } else {
    // echo "Error creating table: " . $conn->error;
    // }
    
    if(isset($_POST['sub'])){
        $name=$_REQUEST['name'];
        $email=$_REQUEST['email'];
        $pnumber=$_REQUEST['pnumber'];
        $pass=$_REQUEST['pass'];
        $cpass=$_REQUEST['cpass'];
    

        $sql_p="SELECT * FROM signup WHERE phonenumber='$pnumber'";
        $sql_e="SELECT * FROM signup WHERE email='$email'";
        $res_p=mysqli_query($conn,$sql_p); 
        $res_e=mysqli_query($conn,$sql_e); 
        if(mysqli_num_rows($res_p)>0){
            $epnumber="* Phone Number Is Already Exists<br>";
        }
        if (mysqli_num_rows($res_e)>0) {
            $eemail="* Email Is Already Exists<br>";
        }
        else{
            $sql = "INSERT INTO signup VALUES ('','$name','$pnumber','$email','$pass','$cpass')";
            if (mysqli_query($conn,$sql)) {
                echo "data stored in database successfully";
            }else{
                echo "ERROR:". mysqli_error($conn);
            }
        }
    }else{
        echo "<br>error";
    }

    // closing connection
    $conn->close();
?>