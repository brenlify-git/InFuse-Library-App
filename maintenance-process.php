<?php
include 'connection.php';
$numBook = $_POST['numBook'];
$numDays = $_POST['numDays'];
$penalty = $_POST['penalty'];

$updStatus = "UPDATE tbl_maintenance SET Allowed_BookBorrow = '$numBook', Allowed_BookDays = '$numDays', Penalty = '$penalty' WHERE Customize_ID = '1'";
$result2=mysqli_query($conn, $updStatus);

if($result2){
    echo "Data Updated Succesfully!";
    header("Location:maintenance.php");
    
}else{
    die(mysqli_error($conn));
}
?>