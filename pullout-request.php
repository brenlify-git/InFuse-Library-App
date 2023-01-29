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
$row = mysqli_fetch_assoc($result2);
$iPrice = (double) $row['Price'];

$iPenalty = (double)$PenaltyFee;

$Total = $iPenalty+$iPrice;


$sqlIns = "INSERT INTO tbl_pulloutbooks (Library_ID, Return_ID, Action, Reason, PenaltyFee, Total) VALUES ('$LibraryID', '$ReturnID', '$Act', '$Reason','$PenaltyFee', $Total)";
$result=mysqli_query($conn, $sqlIns);

$sqlUpdateStatus = "UPDATE tbl_bookreturn SET Status = 'PULLED-OUT' WHERE Return_ID = '$ReturnID'";
$result3=mysqli_query($conn, $sqlUpdateStatus);

$sqlUpdateStatus2 = "UPDATE tbl_bookborrow SET Status = 'PULLED-OUT' WHERE Accession_ID = '$AccesionID'";
$result4=mysqli_query($conn, $sqlUpdateStatus2);

$sqlUpdateStatus3 = "UPDATE tbl_bookinfo SET Status = 'PULLED-OUT' WHERE Accession_ID = '$AccesionID'";
$result5=mysqli_query($conn, $sqlUpdateStatus3);

$sqlUpdateStatus4 = "UPDATE tbl_patrons SET Penalty = $Total WHERE Library_ID = '$LibraryID'";
$result6=mysqli_query($conn, $sqlUpdateStatus4);

if($result){
    echo "Data Inserted Succesfully!";
    header("Location:pullout.php");
}else{
    die(mysqli_error($conn));
}


?>