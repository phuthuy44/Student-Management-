<?php
$con=mysqli_connect("localhost","root","","student_management");
if(!$con){
    echo "Database connected".mysqli_connect_error();
}

?>