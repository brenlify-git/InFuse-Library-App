<?php

include 'connection.php';

$empID = $_POST['empID'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$librarianType = $_POST['librarianType'];
$contactNumber = $_POST['contactNumber'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$municipality = $_POST['municipality'];
$province = $_POST['province'];

$profilePicture = $_FILES['profilePicture'];

if (isset($_FILES['profilePicture'])) {
    $file = $_FILES['profilePicture'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = "profile".$firstName.$lastName.".".$fileActualExt;
                $fileDestination = 'LibrarianPictures/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}



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


include('phpqrcode/qrlib.php');

// how to save PNG codes to server

$tempDir = "qrcode-librarian/";

$codeContents = "Employee ID: " .  $empID . "\nFullname: " . $lastName . ", " . $firstName . " " . $middleInitials. "\nEmail: ". $email. "\nPatron Type: " . $librarianType . "\nContact Number: " . $contactNumber . "\nUsername: " . $username. "\nPassword: " . $password . "\nAddress: " . $street . ", " . $barangay . ", " . $municipality . ", " . $province;

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

$profilePicturePath = "LibrarianPictures/profile".$firstName.$lastName.".".$fileActualExt;

$qrfilepath = "qrcode-librarian/".$fileName;


$sqlInsLibAcc = "INSERT INTO tbl_librarianaccess (empID, firstname, middlename, lastName, email, contactNumber, librarian_username, librarian_password, librarian_type, street, barangay, municipality, province, profilePicture, qrcode) VALUES ('$empID', '$firstName', '$middleName', '$lastName', '$email', '$contactNumber', '$username', '$password', '$librarianType', '$street', '$barangay', '$municipality', '$province', '$profilePicturePath', '$qrfilepath')";
$result22=mysqli_query($conn, $sqlInsLibAcc);







if($result22){
    echo "Data Inserted Succesfully!";
    header("Location:librarian-membership.php");
}else{
    die(mysqli_error($conn));
}


?>