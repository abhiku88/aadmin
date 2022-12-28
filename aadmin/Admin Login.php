<?php require("connection.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="UTF-8" name = "viewport" contect= "width= device-width, initial-scale= 1.0, shrink-to-fit= no">
    <link rel="stylesheet" type= "text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="myform">
            <form method="POST" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']) ?>">
                <h2>ADMIN LOGIN</h2>
                <input type="text" placeholder="Admin Name" name="AdminNmae"><br>
                <input type="password" placeholder=" Admin password" name="Adminpassword"><br>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
        <div class="image">
            <img src="img.jpg">
        </div>
    </div>
    <?php
    function input_filter($data){

        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        $return = $data;
    }
    if(isset($_POST['Login'])){
        $AdminName = input_filter( $_POST['AdminName']);
        $_AdminPassword=  input_filter( $_POST['AdminPassword']);

       $AdminName=  mysqli_real_escape_string($con, $AdminName);
       $_AdminPassword=mysqli_real_escape_string($con, $AdminPass);

       $query= "SELECT * FROM  'Admin Login'  WHERE   'Admin_Name'=? AND  'Admin_Password'=? ";
       if($stmt=mysqli_prepare($con, $query)){

        mysqli_stmt_bind_param($stmt,"ss", $AdminName, $_AdminPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)==1)
        {
            session_start();
            $_SESSION['AdminLoginId']=$AdminName;
            header ("location  : Admin Panel.php");
        }
        else{
            echo "<script>alert('Invalid Admin Nmae or Password')</script>";
            mysqli_stmt_close($stmt);
        }   
    }
        else{

            echo "<script>alert('SQL Query can not be prepared')</script>";
        }

      
    }

    ?>

</body>

</html>