<?php
include 'connection.php';

$output = "";

if(isset($_POST['submit'])){
    
  $sql = "SELECT * FROM tbl_bookinfo ORDER BY Accession_ID DESC";

$res = mysqli_query($conn, $sql);
$i = 1;

if(mysqli_num_rows($res)>0){
 
        $output .='

        

        
        <table class="table table-hover datatable table-bordered text-nowrap text-center" style="max-height: 600px; overflow: auto; display: inline-block;">
        <thead class="table-secondary" style="position:sticky; top: 0 ;">
     
          <tr">
            
            <th scope="col">Accession ID</th>
            <th scope="col">Call Number</th>
            <th scope="col">Book Name</th>
            <th scope="col">Book Author</th>
            <th scope="col">Year Published</th>
            <th scope="col">ISBN</th>
            <th scope="col">Notes</th>
            <th scope="col">Genre</th>
            <th scope="col">Series</th>
            <th scope="col">Price</th>
            <th scope="col">Publisher</th>
            <th scope="col">Copies</th>
            <th scope="col">Status</th>
          </tr>
        
    
        ';

        while ($row = mysqli_fetch_array($res)){

        $output .='
        
        <tr>
                          
                          <td>'. $row['Accession_ID'].'</td>
                          <td>'. $row['Call_No'].'</td>
                          <td>'. $row['Book_Name'].'</td>
                          <td>'. $row['Book_Author'].'</td>
                          <td>'. $row['Year_Published'].'</td>
                          <td>'. $row['ISBN'].'</td>
                          <td>'. $row['Notes'].'</td>
                          <td>'. $row['Genre'].'</td>
                          <td>'. $row['Series'].'</td>
                          <td>'. $row['Price'].'</td>
                          <td>'. $row['Publisher'].'</td>
                          <td>'. $row['Copies'].'</td>
                          <td>'. $row['Status'].'</td>
                         
                        </tr>
        ';
    }

        $output .='</table>';
        date_default_timezone_set('Asia/Manila');
        $filename = "Book-Inventory ".date("Y-m-d H:i:sa");
       
        header('Context-Type:application/force-download');
        header('Content-Disposition:attachment;filename='.$filename.'.xls');
        header('Content-Transfer-Encoding: BINARY');
        echo $output;
    
}

}





?>