<?php

include 'connection.php';
$patronID = $_POST['patronID'];
$accNum = $_POST['accNum'];
$callNumber = $_POST['callNumber'];
$borrowCount = $_POST['borrowCount'];

$borrowCount = $borrowCount - 1;
$dueFee = 10;

$maintenance = "SELECT * FROM tbl_maintenance";
$customize=mysqli_query($conn, $maintenance);


while($rows = mysqli_fetch_assoc($customize)):   
       

$bookDaysAllowed = $rows['Allowed_BookDays'];
$dueFee = $rows['Penalty'];

endwhile;

$borrowDate = date("Y-m-d");
$returnDate = date('Y-m-d', strtotime($borrowDate. ' + ' .$bookDaysAllowed. 'days'));

$sqlIns = "INSERT INTO tbl_bookborrow (Accession_ID, Library_ID, Due_Fee, Borrow_Date, Return_Date, Status) VALUES ('$accNum', '$patronID', '$dueFee', '$borrowDate', '$returnDate', 'NOT RETURNED')";
$result=mysqli_query($conn, $sqlIns);


$updStatus = "UPDATE tbl_bookinfo SET status ='UNAVAILABLE'  WHERE Accession_ID = '$accNum'";
$result2=mysqli_query($conn, $updStatus);

$borrowCount = "UPDATE tbl_patrons SET Borrow_Count = '$borrowCount'  WHERE Library_ID = '$patronID'";
$result3=mysqli_query($conn, $borrowCount);

if($result){
    echo "Data Inserted Succesfully!";
    header("Location:patron-bookborrow-librarian.php");
    
}else{
    die(mysqli_error($conn));
}


?>