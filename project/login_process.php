<?php
    session_start();
        // create connection
        $conn = new mysqli("localhost","root","","applestore");

        // checking connection
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection error");
        }else{
            // echo "connected successfully";
        }

        // LOGIN USER
        if (isset($_POST['submit'])) {
        $lemail = mysqli_real_escape_string($conn, $_POST['email']);
        $lpass = mysqli_real_escape_string($conn, $_POST['pass']);  

        $query = "SELECT * FROM signup WHERE email='$lemail' AND password='$lpass'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $lemail;
          header('location:homepage/home.php');
        }else {
            $logerr="Invalid Email or Password";
        }
    }

    if(isset($_POST['submit'])){
        $sql="select * from signup where email='{$_POST["email"]}'";
        $res=$conn->query($sql);
        if($res->num_rows>0)
        {
            if($row=$res->fetch_assoc())
            {
                $_SESSION['sname']=$row['name'];
                $_SESSION['spnumber']=$row['phonenumber'];
                $_SESSION['semail']=$row['email'];
            }
        }
    }
  


// closing connection
$conn->close();
?>