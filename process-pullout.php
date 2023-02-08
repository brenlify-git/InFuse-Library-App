<?php
include 'connection.php';

$output = "";

if(isset($_POST['submit'])){
    
    $sql = "SELECT * FROM (tbl_pulloutbooks INNER JOIN tbl_patrons ON tbl_pulloutbooks.Library_ID = tbl_patrons.Library_ID INNER JOIN tbl_bookreturn ON tbl_pulloutbooks.Return_ID = tbl_bookreturn.Return_ID INNER JOIN tbl_bookinfo ON tbl_bookreturn.Accession_ID = tbl_bookinfo.Accession_ID)";
    $res = $conn->query($sql);
$i = 1;

if(mysqli_num_rows($res)>0){

        $output .='

        
        <table class="table datatable" border="1px solid">
     
        <tr>
                <th scope="col">Pullout ID</th>
                <th scope="col">Return ID</th>
                <th scope="col">Accession ID</th>
                <th scope="col">Library ID</th>
                <th scope="col">Patron Name</th>
                <th scope="col">Book Name</th>
                <th scope="col">Action</th>
                <th scope="col">Reason</th>
                <th scope="col">Total Fine</th>
                <th scope="col">Pullout Date</th>          
            </tr>
        
    
        ';

        while ($row = mysqli_fetch_array($res)){

        $output .='
        
        <tr>
                          <td>'. $row['Pullout_ID'].'</td>
                          <td>'. $row['Return_ID'].'</td>
                          <td>'. $row['Accession_ID'].'</td>
                          <td>'. $row['Library_ID'].'</td>
                          <td>'. $row['LastName'].", " . $row['FirstName'] . " ". $row['MiddleName'].'</td>
                          <td>'. $row['Book_Name'].'</td>
                          <td>'. $row['Action'].'</td>
                          <td>'. $row['Reason'].'</td>
                          <td>'. $row['Total'].'</td>
                          <td>'. $row['Return_Date'].'</td>
                          <tr>

                       
        ';
    }

        $output .='</table>';
        date_default_timezone_set('Asia/Manila');
        $filename = "Book-Pulledout ".date("Y-m-d H:i:sa");
       
        header('Context-Type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename='.$filename.'.xls');

        echo $output;
    
}

}





?>