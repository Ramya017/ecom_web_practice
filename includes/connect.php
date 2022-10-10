<?php 

// $con = new mysqli or the below (both will work)
$con = mysqli_connect('localhost', 'root','','shopup');
if(!$con){
    die(mysqli_error($con));
}

?>