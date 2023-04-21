<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOG-IN</title>
    <link rel="icon" href="../images/apple logo.png">
    <link rel="stylesheet" href="../css/form_style.css">
</head>
<body>
<p>
    <?php
     error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['submit'])){

        $aname="admin";
        $apass="admin121";
        
        // email validation
        $name=$_POST["name"];
        if($name==""){
            $ename="* Your Name Is Empty";
        }elseif($name!== $aname){
            $ename="*Your Not An Admin";
        }
        // Validate password
       $pass=$_POST["pass"];
       if($pass==""){
        $epass="* Your Password Is Empty";
       }elseif($pass!==$apass){
        $epass="* Your Password Is Wrong";
       }else{
        header("location:admin.php");
       }
    }
    ?>
</p>
    <main>
        <div>
            <b>
                <h1><u>ADMIN&nbsp;&nbsp;LOG-IN</u></h1>
                <form action="adminlogin.php" method="post">
                    <table>
                        <tr>
                            NAME:<input type="text" name="name" placeholder="ex-> admin">
                            <br>
                            <?php echo "$ename";?>
                        </tr>
                        <br>
                        <br>
                        <tr>
                            PASSWORD:<input type="password" name="pass" placeholder="ex-> admin">
                            <br>
                            <?php echo "$epass";?>
                        </tr>
                        <br>
                        <?php echo "$logerr";?>
                        <br>
                        <button><a href="../login.php">back</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="submit">Submit</button>
                    </table>
                </form>
            </b>
        </div>
    </main>
</body>

</html>