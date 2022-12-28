<?php

 $con= mysqli_connect("localhost", "root", "", "testing");

if(mysqli_connect_error()){
    echo "cannot be connect to database";
    exit();
}
else{
    echo "connected";
}
?>