<?php
include 'connection.php';

$output = "";

if(isset($_POST['submit'])){
    
$sql = "SELECT * FROM (((tbl_patrons INNER JOIN tbl_bookreturn ON tbl_patrons.Library_ID = tbl_bookreturn.Library_ID) INNER JOIN tbl_bookinfo ON  tbl_bookreturn.Accession_ID = tbl_bookinfo.Accession_ID) INNER JOIN tbl_bookborrow ON tbl_bookreturn.Borrow_ID = tbl_bookborrow.Borrow_ID)";
$res = mysqli_query($conn, $sql);
$i = 1;

if(mysqli_num_rows($res)>0){

        $output .='

        
        <table class="table datatable" border="1px solid">
     
        <tr>
                    <th scope="col">Return ID</th>
                    <th scope="col">Accession ID</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Library ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Borrow ID</th>
                    <th scope="col">Date Borrowed</th>
                    <th scope="col">Return Date</th>          
                  </tr>
        
    
        ';

        while ($row = mysqli_fetch_array($res)){

        $output .='
        
        <tr>
                          <td>'. $row['Return_ID'].'</td>
                          <td>'. $row['Accession_ID'].'</td>
                          <td>'. $row['Book_Name'].'</td>
                          <td>'. $row['Library_ID'].'</td>
                          <td>'. $row['FirstName'].'</td>
                          <td>'. $row['MiddleName'].'</td>
                          <td>'. $row['LastName'].'</td>
                          <td>'. $row['Borrow_ID'].'</td>
                          <td>'. $row['Borrow_Date'].'</td>
                          <td>'. $row['Return_Date'].'</td>
                       


                          <tr>

                       
        ';
    }

        $output .='</table>';
        date_default_timezone_set('Asia/Manila');
        $filename = "Book-Return ".date("Y-m-d H:i:sa");
       
        header('Context-Type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename='.$filename.'.xls');

        echo $output;
    
}

}





?>