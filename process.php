<?php
include 'connection.php';

$output = "";

if(isset($_POST['submit'])){
    
$sql = "SELECT * FROM tbl_bookinfo ORDER BY Accession_ID DESC";
$res = mysqli_query($conn, $sql);
$i = 1;

if(mysqli_num_rows($res)>0){

        $output .='

        <style>

                      th{
                        font-size: 20px;
                        background-color: #253274;
                        color: white;
                      }
                    </style>
        
        <table class="table border=1">
     
          <tr>
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

       
        header('Context-Type: application/xls');
        header('Content-Disposition:attachment;filename=reports.xls');

        echo $output;
    
}

}





?>