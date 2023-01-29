<?php

include 'connection.php';

$LibraryID = $_POST['libraryID'];
$BorrowID = $_POST['borrowID'];
$AccessID = $_POST['accessionID'];
$firstname = $_POST['firstName'];
$middlename = $_POST['middleName'];
$lastname = $_POST['lastName'];
$bookname = $_POST['bookName'];
$borrowdate = $_POST['borrowDate'];
$duefee = $_POST['dueFee'];

$returnDate = date("Y-m-d");

$addOne = "SELECT * FROM tbl_patrons WHERE Library_ID = '$LibraryID'";
$id4 = $conn->query($addOne);

while($rows = mysqli_fetch_assoc($id4)):   
       

    $borrowCount = $rows['Borrow_Count'];
    
    endwhile;

$borrowCount  = $borrowCount+1;

$borrowCount = "UPDATE tbl_patrons SET Borrow_Count = '$borrowCount'  WHERE Library_ID = '$LibraryID'";
$result3=mysqli_query($conn, $borrowCount);

$sqlIns = "INSERT INTO tbl_bookreturn (Accession_ID, Library_ID, Borrow_ID, Return_Date, Status) VALUES ('$AccessID', '$LibraryID', '$BorrowID', '$returnDate', 'RETURNED')";
$result=mysqli_query($conn, $sqlIns);

$updStatus = "UPDATE tbl_bookinfo SET status ='AVAILABLE' WHERE Accession_ID = '$AccessID'";
$result2=mysqli_query($conn, $updStatus);

$updStatusBook = "UPDATE tbl_bookborrow SET status ='RETURNED' WHERE Borrow_ID = '$BorrowID'";
$result3=mysqli_query($conn, $updStatusBook);

if($result){
    header("Location:patron-bookreturn-librarian.php");
    
}else{
    die(mysqli_error($conn));
}


?>