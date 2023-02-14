<?php
include 'connection.php';

if(isset($_POST) & !empty($_POST)){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $sql = "SELECT * FROM tbl_pendingpatrons JOIN tbl_patrons WHERE tbl_pendingpatrons.Student_ID = '$username' OR tbl_patrons.Student_ID = '$username'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo '<div style="color:red;"><b>' .$username. '</b> is not available</div>';
        echo '<script type="text/javascript">';
        echo 'document.getElementById("register").disabled = true;';
        echo '</script>';
    }
    else{
        echo '<div style="color:green;"><b>' .$username. '</b> is acceptable Student ID</div>';
        echo '<script type="text/javascript">';
        echo 'document.getElementById("register").disabled = false;';
        echo '</script>';
    }
}
?>