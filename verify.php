<?php
session_start();
include 'connection.php';

$sql = "SELECT * FROM tbl_patrons";
$userAcc = $conn->query($sql);

$accFound = false;
if($userAcc->num_rows > 0){
    while($acc = $userAcc->fetch_assoc()) {
        if($acc["Student_ID"] == $_POST['Username'] && $acc["Contact_Number"] == $_POST['Pass']){
            $accFound = true;
            if($acc["Patron_Type"] == "STUDENT"){
                header("Location:dashboard.php?patron=" . $acc["Student_ID"]);
            }
            else if($acc["Patron_Type"] == "FACULTY"){
                header("Location:book-borrowed.php?patron=" . $acc["Student_ID"]);
            }
            else{
                echo "Invalid!";
            }
        }
    }
}

if(!$accFound){
    header("Location:index.php");
}

?>