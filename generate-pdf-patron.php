<?php
include 'connection.php';
$studID = $_POST['studID'];

$sqladmin = "SELECT * FROM tbl_patrons WHERE Student_ID = '$studID'";
$idadmin = $conn->query($sqladmin);


 while($rows = mysqli_fetch_assoc($idadmin)):   

    $studID = $rows['Student_ID'];
    $fname = $rows['FirstName'];
    $fullname = $rows['LastName']. ", " . $rows['FirstName']. " ". $rows['MiddleName'];
    $mname = $rows['MiddleName'];
    $lname = $rows['LastName'];
    $penalty = $rows['Penalty'];
    $borrowcount = $rows['Borrow_Count'];
    $department = $rows['Department'];
    $section = $rows['Section'];
    $street = $rows['Street'];
    $barangay = $rows['Barangay'];
    $municipality = $rows['Municipality'];
    $province = $rows['Province'];
    $contact = $rows['Contact_Number'];
    $username = $rows['patron_username'];
    $password = $rows['patron_password'];
    $libid = $rows['Library_ID'];
    $qrcode = $rows['qrCode'];
   
    
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
$html = file_get_contents("template-patron.php");

$html = str_replace([
                     "{{ studID }}",
                     "{{ firstname }}",
                     "{{ middlename }}",
                     "{{ lastname }}",
                     "{{ penalty }}",
                     "{{ borrowcount }}",
                     "{{ department }}",
                     "{{ section }}",
                     "{{ street }}",
                     "{{ barangay }}",
                     "{{ municipality }}",
                     "{{ province }}",
                     "{{ contact }}",
                     "{{ username }}",
                     "{{ password }}",
                     "{{ libid }}",
                     "{{ qrcode }}"
                     
                 
                   
                     ], [$studID, $fname, $mname, $lname, $penalty, $borrowcount, $department, $section,
                        $street, $barangay, $municipality, $province, $contact, $username, $password, $libid, $qrcode], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "$fullname"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("patrons.pdf", ["Attachment" => 0]);
