<?php
    $con = mysqli_connect("localhost","root","","gamoso");

    if(!$con){
        die('Connection Failed'.mysqli_connect_error());
    }
?>