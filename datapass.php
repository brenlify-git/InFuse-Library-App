<?php
include 'DBConnect.php';

if(isset($_POST['aid'])){
    $db = new DBConnect;
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT * FROM tbl_patrons WHERE Student_ID = " . $_POST['aid']);
    $stmt->execute();
    $dets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dets);
}
function loadDetails() {
    $db = new DBConnect;
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT * FROM tbl_patrons");
    $stmt->execute();
    $name = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $name;
}

?>