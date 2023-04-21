<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN-UP</title>
    <link rel="icon" href="images/apple logo.png">
    <link rel="stylesheet" href="./css/form_style.css">
  </head>
  <body>
    <p>
      <?php 
      session_start();
    error_reporting(E_ERROR | E_PARSE);
    include "signup_process.php";
    
    if(isset($_POST['sub'])){
            
      $name=$_POST["name"];
      $email=$_POST["email"];
      $pnumber=$_POST["pnumber"];
      $pass=$_POST["pass"];
      $cpass=$_POST["cpass"];

      
      $_SESSION["name"]=$name;
      $_SESSION["email"]=$email;
      $_SESSION["phone"]=$pnumber;
      
      // validation format
      $number    = preg_match('@[0-9]@', $pnumber);
      $uppercase = preg_match('@[A-Z]@', $pass);
      $lowercase = preg_match('@[a-z]@', $pass);
      $number    = preg_match('@[0-9]@', $pass);
      $specialChars = preg_match('@[^\w]@', $pass);
      
      // name validation
      if ($name=="") {
        $ename="* Your Name Is Empty"."<br>";
      } //   email validation
      else if ($email=="") {
        $eemail= "* Your Email Is Empty"."<br>";
      }
      else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $eemail= "* Invaild Email Format"."<br>";
      }//   phone number validation
      else if($pnumber==""){
        $epnumber= "* Your Phone Number Is Empty"."<br>";
      }
      else if(!$number && strlen($pnumber) < 10){
        $epnumber= "* Only Phone Number Are Allowed"."<br>";
      }//   password validation
      else if ($pass=="") {
        $epass= "* Your Password Is Empty"."<br>";
      }
      else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
        $epass= "* Password should be at least 8 characters"."<br>"."
        in length and should include at least one"."<br>"."upper case letter, 
        one number, and one"."<br>"."special character"."<br>";
      }
      else if($pass!==$cpass){
        $ecpass= "* Not Match To Password"."<br>";
      } //   confirm password validation
      else if ($cpass=="") {
        $ecpass="* Your Confirm-Password Is Empty"."<br>";  
        // closing connection
        $conn->close();
        header("location:signup.php?All Inputs are requird");
      } 
      else{
        header("location:login.php");
      }
    }
    ?>
</p>
     <main>
       <div>
          <b>
            <h1>SIGN-UP</h1>
            <form action="signup.php" method="post">
                NAME: <input type="text" id="name" name="name" placeholder="NAME" required>
                <br>
                <?php echo"$ename";?>
                <br>
                EMAIL: <input type="text" id="email" name="email" placeholder="EMAIL" required>
                <br>
                <?php echo"$eemail";?>
                <br>
                PHONE NUMBER: <input type="text" id="pnumber" name="pnumber" placeholder="PHONE NUMBER" required>
                <br>
                <?php echo"$epnumber";?>
                <br>
                PASSWORD: <input type="password" id="pass" name="pass" placeholder="PASSWORD" required>
                <br>
                <?php echo"$epass";?>
                <br>
                CONFIRM-PASSWORD: <input type="password" id="cpass" name="cpass" placeholder="CONFIRM-PASSWORD" required>
                <br>
                <?php echo"$ecpass";?>
                <br>
                <button name="sub">SUBMIT</button>
                <br>
                <?php echo "$aa"; ?>
                <br>
            </form>
          </b>
        </div>
    </main>
</body>
</html>