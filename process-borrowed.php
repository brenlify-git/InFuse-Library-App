<?php
include 'connection.php';

$output = "";

if(isset($_POST['submit'])){
    
$sql = "SELECT tbl_bookborrow.Borrow_ID, Due_Fee, Borrow_Date,tbl_bookinfo.Accession_ID, Book_Name,tbl_patrons.Library_ID, Student_ID, FirstName, MiddleName, LastName, Patron_Type, Contact_Number, Penalty, Department, Section, Street, Barangay, Municipality, Province FROM (((tbl_patrons INNER JOIN tbl_bookreturn ON tbl_patrons.Library_ID = tbl_bookreturn.Library_ID) INNER JOIN tbl_bookinfo ON tbl_bookreturn.Accession_ID = tbl_bookinfo.Accession_ID) INNER JOIN tbl_bookborrow ON tbl_bookreturn.Borrow_ID = tbl_bookborrow.Borrow_ID);";
$res = mysqli_query($conn, $sql);
$i = 1;

if(mysqli_num_rows($res)>0){

        $output .='

        
        <table class="table datatable border=1">
     
        <tr>
                    <th scope="col">Borrow ID</th>
                    <th scope="col">Due Fee</th>
                    <th scope="col">Borrow Date</th>
                    <th scope="col">Accession ID</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Library ID</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Penalty</th>
                    <th scope="col">Department</th>
                    <th scope="col">Section</th>
                    <th scope="col">Address</th>
                  </tr>
        
    
        ';

        while ($row = mysqli_fetch_array($res)){

        $output .='
        
        <tr>
                          <td>'. $row['Borrow_ID'].'</td>
                          <td>'. $row['Due_Fee'].'</td>
                          <td>'. $row['Borrow_Date'].'</td>
                          <td>'. $row['Accession_ID'].'</td>
                          <td>'. $row['Book_Name'].'</td>
                          <td>'. $row['Library_ID'].'</td>
                          <td>'. $row['Student_ID'].'</td>
                          <td>'. $row['FirstName'].'</td>
                          <td>'. $row['MiddleName'].'</td>
                          <td>'. $row['Patron_Type'].'</td>
                          <td>'. $row['Contact_Number'].'</td>
                          <td>'. $row['Penalty'].'</td>
                          <td>'. $row['Department'].'</td>
                          <td>'. $row['Section'].'</td>
                          <td>'. $row['Street'].'</td>
                          <td>'. $row['Province'].'</td>
                          <td>'. $row['Municipality'].'</td>
                          <td>'. $row['Province'].'</td>



                          <tr>
                     
                         
                        </tr>
        ';
    }

        $output .='</table>';
        date_default_timezone_set('Asia/Manila');
        $filename = "BorrowedBooks-Masterlist ".date("Y-m-d H:i:sa");
       
        header('Context-Type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename='.$filename.'.xls');

        echo $output;
    
}

}





?>