<?php

include 'connection.php';               

if(isset($_POST['updateData'])){
    $AccID = $_POST['Accession_ID'];
    $CallNumber = $_POST['Call_Number'];
    $BookName = $_POST['Book_Name'];
    $BookAuthor = $_POST['Book_Author'];
    $YearPublished = $_POST['Year_Published'];
    $ISBN = $_POST['ISBN'];
    $Genre = $_POST['Genre'];
    $Series = $_POST['Series'];
    $Price = $_POST['Price'];
    $Copies = $_POST['Copies'];
    $Pulisher = $_POST['Publisher'];
    $Status = $_POST['Status'];
    $Notes = $_POST['Notes'];

    $sqlUpd = "UPDATE tbl_bookinfo SET  Call_No = '$CallNumber', Book_Name = '$BookName', Book_Author = '$BookAuthor', Year_Published = '$YearPublished', ISBN = '$ISBN', Genre = '$Genre', Series = '$Series', Price = '$Price', Copies = '$Copies', Publisher = '$Pulisher', Status = '$Status', Notes = '$Notes' WHERE Accession_ID = '$AccID'";
    $result=mysqli_query($conn, $sqlUpd);

    if($result){
        
        echo "Data Updated Succesfully!";
        header("Location:update-books.php");
        
    }else{
        die(mysqli_error($conn));
    }

}

?>