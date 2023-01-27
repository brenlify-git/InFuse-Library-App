<?php

include 'connection.php';
$patronID = $_POST['patronID'];
$accNum = $_POST['accNum'];
$callNumber = $_POST['callNumber'];
$dueFee = 10;

$borrowDate = date("Y-m-d");
$returnDate = date('Y-m-d', strtotime($borrowDate. ' + 2 days'));

$sqlIns = "INSERT INTO tbl_bookborrow (Accession_ID, Library_ID, Due_Fee, Borrow_Date, Return_Date, Status) VALUES ('$accNum', '$patronID', '$dueFee', '$borrowDate', '$returnDate', 'NOT RETURNED')";
$result=mysqli_query($conn, $sqlIns);


$updStatus = "UPDATE tbl_bookinfo SET status ='UNAVAILABLE' WHERE Accession_ID = '$accNum'";
$result2=mysqli_query($conn, $updStatus);

if($result){
    echo "Data Inserted Succesfully!";
    header("Location:patron-bookborrow.php");
    
}else{
    die(mysqli_error($conn));
}


?>