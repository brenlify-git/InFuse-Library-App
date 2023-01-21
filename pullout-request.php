<?php

include 'connection.php';

$AccesionID = $_POST['Accession_ID'];

$LibraryID = $_POST['LibraryID'];
$ReturnID = $_POST['ReturnID'];
$Act = $_POST['Act'];
$PenaltyFee = $_POST['Penalty_Fee'];

$Reason = $_POST['Reason'];

$Status = $_POST['Status'];

// $getTotal = "SELECT Total FROM tbl_pulloutbooks WHERE Library_ID = '$LibraryID'";
// $result2 = mysqli_query($conn, $getTotal);

$getPrice = "SELECT Price FROM tbl_bookinfo WHERE Accession_ID = '$AccesionID'";
$result2 = mysqli_query($conn, $getPrice);

$iPrice = (int)$result2;
$iPenalty = (int)$PenaltyFee;

$Total = $iPenalty+$iPrice;



$sqlIns = "INSERT INTO tbl_pulloutbooks (Library_ID, Return_ID, Action, Reason, PenaltyFee, Total) VALUES ('$LibraryID', '$ReturnID', '$Act', '$Reason','$PenaltyFee', $Total)";
$result=mysqli_query($conn, $sqlIns);

$sqlUpdateStatus = "UPDATE tbl_bookreturn SET Status = 'RETURNED' WHERE Accession_ID = '$AccesionID'";
$result3=mysqli_query($conn, $sqlUpdateStatus);

$sqlUpdateStatus2 = "UPDATE tbl_bookborrow SET Status = 'RETURNED' WHERE Accession_ID = '$AccesionID'";
$result4=mysqli_query($conn, $sqlUpdateStatus2);

if($result){
    echo "Data Inserted Succesfully!";
    header("Location:pullout.php");
}else{
    die(mysqli_error($conn));
}


?>