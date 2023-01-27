<?php
$LibID = $_POST['LibraryID'];
$selectStud = "SELECT * FROM tbl_patrons WHERE Student_ID = $LibID";
$getID = $conn->query($selectStud);
?>