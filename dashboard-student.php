
<?php 
include 'connection.php';

$countStudents = mysqli_query($conn, "SELECT COUNT(*) AS countS  FROM tbl_patrons WHERE Patron_Type = 'PATRON'");
$row_countStud = mysqli_fetch_assoc($countStudents);
$countStud = $row_countStud["countS"];


$countFaculty = mysqli_query($conn, "SELECT COUNT(*) AS countF  FROM tbl_librarianaccess WHERE librarian_type = 'LIBRARIAN'");
$row_countFact = mysqli_fetch_assoc($countFaculty);
$countFact = $row_countFact["countF"];


$countAvailableBook = mysqli_query($conn, "SELECT COUNT(*) AS countAB  FROM tbl_bookinfo WHERE Status = 'AVAILABLE'");
$row_countAvail = mysqli_fetch_assoc($countAvailableBook);
$countAvail = $row_countAvail["countAB"];


$countBorrowed = mysqli_query($conn, "SELECT COUNT(*) AS countBRW  FROM tbl_bookinfo WHERE Status = 'PULLED-OUT'");
$row_countBor = mysqli_fetch_assoc($countBorrowed);
$countBor = $row_countBor["countBRW"];


$countReturned = mysqli_query($conn, "SELECT COUNT(*) AS countRt  FROM tbl_adminaccess");
$row_countRt = mysqli_fetch_assoc($countReturned);
$countRt = $row_countRt["countRt"];


$countCategory = mysqli_query($conn, "SELECT COUNT(DISTINCT Genre) AS category  FROM tbl_bookinfo");
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
          <li class="breadcrumb-item"><a href="dashboard-student.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Dashboard Cards -->
            <div class="col-xxl-4 col-md-12">
              <div class="card info-card revenue-card">



                <div class="card-body">
                  <h5 class="card-title">Borrow Count <span>| As of Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $_SESSION['Borrow_Count']?> </h6>
                      <span class="text-success small pt-1 fw-bold">ONLY</span> <span
                        class="text-muted small pt-2 ps-1">ME</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             <!-- Dashboard Cards -->
             <div class="col-xxl-4 col-md-12">
              <div class="card info-card revenue-card">



                <div class="card-body">
                  <h5 class="card-title">Penalties <span>| As of Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $_SESSION['Penalty']?> </h6>
                      <span class="text-success small pt-1 fw-bold">ONLY</span> <span
                        class="text-muted small pt-2 ps-1">ME</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            
           

          
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