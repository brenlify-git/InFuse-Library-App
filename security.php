<?php
include 'connection.php';

$username = $_POST['Username'];
$password = $_POST['Pass'];

$sqlAdmin = "SELECT * FROM tbl_adminaccess WHERE admin_username = '$username' AND admin_password = '$password' ";
$sqlPatron = "SELECT * FROM tbl_patronaccess WHERE patron_username = '$username' AND patron_password = '$password' ";

$resultAdmin = mysqli_query($conn, $sqlAdmin);
$resultPatron = mysqli_query($conn, $sqlPatron);

//Admin

if(mysqli_num_rows($resultAdmin) === 1){
    $rowAdmin = mysqli_fetch_assoc($resultAdmin);
    
    if(is_array($rowAdmin)){
        $_SESSION['admin_username'] = $rowAdmin['admin_username'];
        $_SESSION['admin_password'] = $rowAdmin['admin_password'];
    }
    else{
        echo'<script type ="text/javascript">';
        echo'alert ("Invalid Input");';
        echo'window.location href ="index.php"';
        echo"</script>";
    }
    if($_SESSION['admin_username'] === $username && $_SESSION['admin_password'] === $password){
        header("Location:dashboard.php");
    }
}

//Patron

else if (mysqli_num_rows($resultPatron) === 1){
    $rowPatron = mysqli_fetch_assoc($resultPatron);

    if(is_array($rowPatron)){
        $_SESSION['patron_username'] = $rowPatron['patron_username'];
        $_SESSION['patron_password'] = $rowPatron['patron_password'];
    }
    else{
        echo'<script type ="text/javascript">';
        echo'alert ("Invalid Input");';
        echo'window.location href ="index.php"';
        echo"</script>";
    }
    if($_SESSION['patron_username'] === $username && $_SESSION['patron_password'] === $password){
        header("Location:dashboard-student.php");
    }
}


?>