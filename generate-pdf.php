<?php
include 'connection.php';
$empID = $_POST['empID'];

$sqladmin = "SELECT * FROM tbl_librarianaccess WHERE empID = '$empID'";

$idadmin = $conn->query($sqladmin);


 while($rows = mysqli_fetch_assoc($idadmin)):   
    $firstname =  $rows['lastName'].", ".$rows['firstname']. " " . $rows['middlename'];
    $fname = $rows['firstname'];
    $mname = $rows['middlename'];
    $lname = $rows['lastName'];
    $email = $rows['email'];
    $profilePicture = $rows['profilePicture'];
    $street = $rows['street'];
    $barangay = $rows['barangay'];
    $municipality = $rows['municipality'];
    $province = $rows['province'];
    $contact = $rows['contactNumber'];
    $username = $rows['librarian_username'];
    $password = $rows['librarian_password'];
    $qrcode = $rows['qrcode'];
    
 endwhile;


require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;


$quantity = "45";

//$html = '<h1 style="color: green">Example</h1>';
//$html .= "Hello <em>$name</em>";
//$html .= '<img src="example.png">';
//$html .= "Quantity: $quantity";

/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */
$dompdf->setPaper("A4", "portrait");

/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template.php");

$html = str_replace(["{{ name }}",
                     "{{ email }}",
                     "{{ empID }}",
                     "{{ firstnamee }}",
                     "{{ middlename }}",
                     "{{ lastname }}",
                     "{{ profilePic }}",
                     "{{ street }}",
                     "{{ barangay }}",
                     "{{ municipality }}",
                     "{{ province }}",
                     "{{ contact }}",
                     "{{ username }}",
                     "{{ password }}",
                     "{{ qrcode }}"
                     ], [$firstname, $email, $empID, $fname, $mname, $lname, $profilePicture, $street, $barangay, $municipality, $province,
                         $contact, $username, $password, $qrcode], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "$firstname"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("invoice.pdf", ["Attachment" => 0]);
