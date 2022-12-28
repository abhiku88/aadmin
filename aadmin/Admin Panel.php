<?php

session_start();
session_regenerate_id(true);
if(!isset($_SESSION['AdminLoginId'])){
    header("location: Admin Login.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
    body {
        margin: 0;

    }

    div.header {
        color: green;
        font-family: poppins;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 0 60px;
        background-color: #1c1c1c;
    }

    div.header button {
        background-color: f0f0f0;
        font-size: 16px;
        font-weight: 550;
        padding: 8px 12px;
        border: 2px solid black;
        border-radius: 6px;
    }
    </style>
</head>

<body>
    <div class="header">
        <h1>Admin Panel - <?php echo $_SESSION['AdminLoginId']    ?></h1>
        <form action = "<?php echo $_SERVER['PHP SELF'] ?>" method=  "post">
        <button type="submit" name="logout">LOGOUT</button>
   </form>
</div>

    <?php
    if(isset($_POST['Logout'])){

        session_destroy();
        header("location: Admin Login.php");

    }
?>
</body>

</html>