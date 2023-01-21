<?php

include 'connection.php';
$CustID = $_POST['CustID'];
$CallNumber = $_POST['CallNumber'];
$BookName = $_POST['BookName'];
$BookAuthor = $_POST['BookAuthor'];
$YearPublished = $_POST['YearPublished'];
$ISBN = $_POST['ISBN'];
$Genre = $_POST['Genre'];
$Series = $_POST['Series'];
$Price = $_POST['Price'];
$Copies = $_POST['Copies'];
$Pulisher = $_POST['Pulisher'];
$Status = $_POST['Status'];
$Notes = $_POST['Notes'];

$sqlIns = "INSERT INTO tbl_bookinfo (Customize_ID, Call_No, Book_Name, Book_Author, Year_Published, ISBN, Notes, Series, Price, Publisher, Genre, Copies, Status) VALUES ('1', '$CallNumber', '$BookName', '$BookAuthor', '$YearPublished', '$ISBN', '$Notes', '$Series', '$Price', '$Pulisher', '$Genre', '$Copies', '$Status')";
$result=mysqli_query($conn, $sqlIns);

if($result){
    echo "Data Inserted Succesfully!";
    header("Location:add-books.php");
}else{
    die(mysqli_error($conn));
}


?>