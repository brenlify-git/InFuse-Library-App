<?php

include 'connection.php';

$LibraryID = $_POST['libraryid'];
$Balance = $_POST['penalties'];

$sqlUpdateStatus4 = "UPDATE tbl_patrons SET Penalty = $Balance WHERE Library_ID = '$LibraryID'";
$result6=mysqli_query($conn, $sqlUpdateStatus4);

if($result6){
    echo "Data Inserted Succesfully!";
    header("Location:payment-librarian.php");
}else{
    die(mysqli_error($conn));
}


?>