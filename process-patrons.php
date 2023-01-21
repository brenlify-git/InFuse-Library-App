<?php
include 'connection.php';

$output = "";

if(isset($_POST['submit'])){
    
$sql = "SELECT * FROM tbl_patrons";
$res = mysqli_query($conn, $sql);
$i = 1;

if(mysqli_num_rows($res)>0){

        $output .='

        
        <table class="table border=1">
     
        <tr>
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
        <th scope="col">Street</th>
        <th scope="col">Barangay</th>
        <th scope="col">Municipality</th>
        <th scope="col">Province</th>
      </tr>
        
    
        ';

        while ($row = mysqli_fetch_array($res)){

        $output .='
        
        <tr>
                          <td>'. $row['Library_ID'].'</td>
                          <td>'. $row['Student_ID'].'</td>
                          <td>'. $row['FirstName'].'</td>
                          <td>'. $row['MiddleName'].'</td>
                          <td>'. $row['LastName'].'</td>
                          <td>'. $row['Patron_Type'].'</td>
                          <td>'. $row['Contact_Number'].'</td>
                          <td>'. $row['Penalty'].'</td>
                          <td>'. $row['Department'].'</td>
                          <td>'. $row['Section'].'</td>
                          <td>'. $row['Street'].'</td>
                          <td>'. $row['Barangay'].'</td>
                          <td>'. $row['Municipality'].'</td>
                          <td>'. $row['Province'].'</td>


                          <tr>
                     
                         
                        </tr>
        ';
    }

        $output .='</table>';
        date_default_timezone_set('Asia/Manila');
        $filename = "Book-Borrowed ".date("Y-m-d H:i:sa");
       
        header('Context-Type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename='.$filename.'.xls');

        echo $output;
    
}

}





?>