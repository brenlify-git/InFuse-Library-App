<?php
include 'connection.php';

$output = '';

if(isset($_POST["export_excel"])){
  $filename = "data_export_".date('Ymd').".xls";
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  $show_column = false;


}
?>