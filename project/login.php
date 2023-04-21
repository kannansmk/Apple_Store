<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG-IN</title>
    <link rel="icon" href="images/apple logo.png">
    <link rel="stylesheet" href="./css/form_style.css">
</head>
<body>
<p>
    <?php
    session_start();
     error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['submit'])){
        
        // email validation
        $lemail=$_POST["email"];
        $_SESSION["user"]=$lemail;
        if ($lemail=="") {   
        $eemail1= "* Your Email Is Empty"."<br>";
        }
        else if(!filter_var($lemail,FILTER_VALIDATE_EMAIL)){
        $eemail1= "* Invaild Email Format"."<br>";
        }

        // Validate password strength
        $lpass=$_POST["pass"];
        $uppercase = preg_match('@[A-Z]@', $lpass);
        $lowercase = preg_match('@[a-z]@', $lpass);
        $number    = preg_match('@[0-9]@', $lpass);
        $specialChars = preg_match('@[^\w]@', $lpass);

        if ($lpass=="") {
        $epass1= "* Your Password Is Empty"."<br>";
        }
        else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($lpass) < 8) {
        $epass1= "* Password should be at least 8 characters"."<br>"."in length and should include at least one"."<br>"."upper case letter, one number, and one"."<br>"."special character"."<br>";
        }
    }
     include "login_process.php";
    ?>
</p>
    <main>
        <div>
            <b>
                <h1><u>LOG-IN</u></h1>
                <form action="login.php" method="post">
                    <table>
                        <tr>
                            EMAIL:<input type="email" name="email" placeholder="ex-> abc@gmail.com">
                            <br>
                            <?php echo "$eemail1";?>
                        </tr>
                        <br>
                        <tr>
                            PASSWORD:<input type="password" name="pass" placeholder="ex-> @Abc1234">
                            <br>
                            <?php echo "$epass1";?>
                        </tr>
                        <br>
                        <?php echo "$logerr";?>
                        <br>
                        <br>
                        <button><a href="./admin/adminlogin.php">ADMIN</a></button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button name="submit">SUBMIT</button>
                    </table>
                </form>
            </b>
        </div>
    </main>
</body>

</html>