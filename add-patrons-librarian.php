<?php

include 'connection.php';

$StudentID = $_POST['studID'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$patronType = $_POST['patronType'];
$contactNumber = $_POST['contactNumber'];
$department = $_POST['department'];
$section = $_POST['section'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$municipality = $_POST['municipality'];
$province = $_POST['province'];
$penalty = 0.00;


function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$randomString = generateRandomString();


function getInitials($name) {
    $name = explode(" ", $name);
    $initials = "";
    foreach ($name as $word) {
        $initials .= strtoupper($word[0]);
    }
    return $initials;
}

function getMiddleInitials($name) {
    $name = explode(" ", $name);
    $initials = "";
    foreach ($name as $word) {
        $initials .= strtoupper($word[0]);
    }
    return $initials;
}
$middleInitials = getMiddleInitials($middleName);

$username = $firstName . " " . $lastName;

$password = getInitials($firstName). $randomString;

$maintenance = "SELECT * FROM tbl_maintenance";
$customize=mysqli_query($conn, $maintenance);

while($rows = mysqli_fetch_assoc($customize)):   
    $borrowCount = $rows['Allowed_BookBorrow'];
endwhile;

include('phpqrcode/qrlib.php');

// how to save PNG codes to server

$tempDir = "qrcode-patrons/";

$codeContents = "Student ID: " .  $StudentID . "\nFullname: " . $lastName . ", " . $firstName . " " . $middleInitials. "\nPatron Type: " . $patronType . "\nContact Number: " . $contactNumber . "\nDepartment: " . $department . "\nSection: " . $section . "\nUsername: " . $username. "\nPassword: " . $password . "\nAddress: " . $street . ", " . $barangay . ", " . $municipality . ", " . $province;

// we need to generate filename somehow, 
// with md5 or with database ID used to obtains $codeContents...
$fileName = 'InFuse_Library-'. $firstName.$lastName. md5($codeContents).'.png';

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

$sqlIns = "INSERT INTO tbl_patrons (Student_ID, FirstName, MiddleName, LastName, Patron_Type, Contact_Number, patron_username, patron_password, qrCode, Penalty, Borrow_Count, Department, Section, Street, Barangay, Municipality, Province) 
VALUES ('$StudentID', '$firstName', '$middleName', '$lastName', 'PATRON', '$contactNumber', '$username', '$password', '$urlRelativeFilePath', '$penalty', '$borrowCount', '$department', '$section', '$street', '$barangay', '$municipality', '$province')";
$result=mysqli_query($conn, $sqlIns);


if($result){
    echo "Data Inserted Succesfully!";
    header("Location:membership-add-librarian.php");
}else{
    die(mysqli_error($conn));
}


?>