<?php 

include 'connection.php';

$countStudents = mysqli_query($conn, "SELECT COUNT(*) AS countS  FROM tbl_patrons WHERE Patron_Type = 'STUDENT'");
$row_countStud = mysqli_fetch_assoc($countStudents);
$countStud = $row_countStud["countS"];


$countFaculty = mysqli_query($conn, "SELECT COUNT(*) AS countF  FROM tbl_patrons WHERE Patron_Type = 'FACULTY'");
$row_countFact = mysqli_fetch_assoc($countFaculty);
$countFact = $row_countFact["countF"];


$countAvailableBook = mysqli_query($conn, "SELECT COUNT(*) AS countAB  FROM tbl_bookinfo WHERE Status = 'AVAILABLE'");
$row_countAvail = mysqli_fetch_assoc($countAvailableBook);
$countAvail = $row_countAvail["countAB"];


$countBorrowed = mysqli_query($conn, "SELECT COUNT(*) AS countBRW  FROM tbl_bookborrow");
$row_countBor = mysqli_fetch_assoc($countBorrowed);
$countBor = $row_countBor["countBRW"];


$countReturned = mysqli_query($conn, "SELECT COUNT(*) AS countRt  FROM tbl_bookreturn");
$row_countRt = mysqli_fetch_assoc($countReturned);
$countRt = $row_countRt["countRt"];


$countCategory = mysqli_query($conn, "SELECT COUNT(DISTINCT Category) AS category  FROM tbl_bookinfo");
$row_countCat = mysqli_fetch_assoc($countCategory);
$countCat = $row_countCat["category"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Patron</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Logo Only.png" rel="icon">
  <link href="assets/img/Logo Only.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar-student.php';?>
  <?php include 'sidebar-student.php';?>

  <!-- End Sidebar and Header-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

        <div class="welcome" style="text-align: center; margin-top: 10%">
        <h1><b>Welcome Nationalian!</b></h1>
        <h4>This is your dashboard</h4>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>