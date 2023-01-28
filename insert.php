<?php

include 'connection.php';

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



include('phpqrcode/qrlib.php');

// how to save PNG codes to server

$tempDir = "qrcodes-generated/";

$codeContents = "Call Number: " .  $CallNumber . "\nBook Name: " . $BookName . "\nBook Author: " . $BookAuthor . "\nYear Published: " . $YearPublished . "\nISBN: " . $ISBN . "\nGenre: " . $Genre . "\nSeries: " . $Series . "\nPrice: " . $Price  . "\nPublisher: " . $Pulisher;

// we need to generate filename somehow, 
// with md5 or with database ID used to obtains $codeContents...
$fileName = 'InFuse_Library-'.md5($codeContents).'.png';

$pngAbsoluteFilePath = $tempDir.$fileName;
$urlRelativeFilePath = $tempDir.$fileName;

// generating
if (!file_exists($pngAbsoluteFilePath)) {
    QRcode::png($codeContents, $pngAbsoluteFilePath);
    echo 'File generated!';
    echo '<hr />';
} else {
    echo 'File already generated! We can use this cached file to speed up site on common codes!';
    echo '<hr />';
}

echo 'Server PNG File: '.$pngAbsoluteFilePath;
echo '<hr />';

// displaying
echo '<img src="'.$urlRelativeFilePath.'" />';


$sqlIns = "INSERT INTO tbl_bookinfo (Customize_ID, Call_No, Book_Name, Book_Author, Year_Published, ISBN, Notes, Series, Price, Publisher, Genre, Barcode, Copies, Status) VALUES ('1', '$CallNumber', '$BookName', '$BookAuthor', '$YearPublished', '$ISBN', '$Notes', '$Series', '$Price', '$Pulisher', '$Genre', '$urlRelativeFilePath', '$Copies', '$Status')";
$result=mysqli_query($conn, $sqlIns);

if($result){
    echo "Data Inserted Succesfully!";
    header("Location:add-books.php");
}else{
    die(mysqli_error($conn));
}


?>