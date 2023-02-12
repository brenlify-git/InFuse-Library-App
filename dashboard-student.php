<?php 
include 'connection.php';



$lastBook = mysqli_query($conn, "SELECT Book_Name AS LastBook  FROM tbl_bookinfo WHERE status = 'AVAILABLE' ORDER BY Accession_ID DESC LIMIT 1");
$row_lastBook = mysqli_fetch_assoc($lastBook);
$lastBookView = $row_lastBook["LastBook"];


$lastAuthor = mysqli_query($conn, "SELECT Book_Author AS LastAuth  FROM tbl_bookinfo WHERE status = 'AVAILABLE' ORDER BY Accession_ID DESC LIMIT 1");
$row_lastAuth = mysqli_fetch_assoc($lastAuthor);
$lastAuthView = $row_lastAuth["LastAuth"];


$lastBook2 = mysqli_query($conn, "SELECT Book_Name AS LastBook2  FROM tbl_bookinfo WHERE status = 'AVAILABLE' ORDER BY Accession_ID DESC LIMIT 1,1");
$row_lastBook2 = mysqli_fetch_assoc($lastBook2);
$lastBookView2 = $row_lastBook2["LastBook2"];

$lastAuthor2 = mysqli_query($conn, "SELECT Book_Author AS LastAuth2  FROM tbl_bookinfo WHERE status = 'AVAILABLE' ORDER BY Accession_ID DESC LIMIT 1,1");
$row_lastAuth2 = mysqli_fetch_assoc($lastAuthor2);
$lastAuthView2 = $row_lastAuth2["LastAuth2"];




date_default_timezone_set('Asia/Manila');
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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar-student.php';?>
  <?php include 'sidebar-student.php';?>

  <!-- End Sidebar and Header-->

  <?php 
$studID = $_SESSION['Library_ID'];

$sql = "SELECT * FROM tbl_bookborrow INNER JOIN tbl_bookinfo ON tbl_bookborrow.Accession_ID = tbl_bookinfo.Accession_ID WHERE tbl_bookborrow.Library_ID = '$studID' && tbl_bookborrow.status = 'NOT RETURNED'";
$id = $conn->query($sql);


$sql2 = "SELECT * FROM tbl_patrons WHERE Library_ID = '$studID'";
$id2 = $conn->query($sql2);

$borrow = "SELECT * FROM tbl_maintenance";
$id3 = $conn->query($borrow);

while($maintain = mysqli_fetch_assoc($id3)):   

  $allowed = $maintain['Allowed_BookBorrow'];
  
endwhile;
  


while($rowBCount = mysqli_fetch_assoc($id2)):   

$borrowCount = $rowBCount['Borrow_Count'];
$penalties = $rowBCount['Penalty'];

endwhile;

?>


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
          <div class="col-xxl-6 col-md-12">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Borrow Count <span>| As of <?php echo date('F d, Y'); ?></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal"></i>
                  </div>
                  <div class="ps-3">
                    <h6> <?php echo $borrowCount ?> </h6>
                    <span class="text-success small pt-1 fw-bold">ONLY</span> <span
                      class="text-muted small pt-2 ps-1">ME</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Dashboard Cards -->
          <div class="col-xxl-6 col-md-12">
            <div class="card info-card sales-card">



              <div class="card-body">
                <h5 class="card-title">Penalties <span>| As of <?php echo date('F d, Y'); ?></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cash-coin"></i>
                  </div>
                  <div class="ps-3">
                    <h6> <?php echo $penalties?> </h6>
                    <span class="text-success small pt-1 fw-bold">ONLY</span> <span
                      class="text-muted small pt-2 ps-1">ME</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->




          <!-- Dashboard Cards -->
          <div class="col-xxl-6 col-md-12">
            <div class="card info-card revenue-card">

              <div class="card-body">

                <h5 class="card-title">New Acquired Book <span>| As of <?php echo date('F d, Y'); ?></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal-plus"></i>
                  </div>
                  <div class="ps-3">
                    <h6> <?php echo $lastBookView ?> </h6>
                    <h5 class="pt-1 fw-bold text-success"><?php echo $lastAuthView ?></h5></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->


          <!-- Dashboard Cards -->
          <div class="col-xxl-6 col-md-12">
            <div class="card info-card revenue-card">

              <div class="card-body">

                <h5 class="card-title">New Acquired Book <span>| As of <?php echo date('F d, Y'); ?></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal-plus"></i>
                  </div>
                  <div class="ps-3">
                    <h6> <?php echo $lastBookView2 ?> </h6>
                    <h5 class="pt-1 fw-bold text-success"><?php echo $lastAuthView2 ?></h5></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->
        </div>
      </div>

    </section>


    <div class="pagetitle">
      <h1>Your Borrowed Book</h1>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">


        <?php
            if($borrowCount < $allowed){

                  while($rowBorrow = mysqli_fetch_assoc($id)):   
                ?>

          <!-- Dashboard Cards -->
          <div class="col-xxl-6 col-md-12">
            <div class="card info-card customers-card">



              <div class="card-body">
                <h5 class="card-title">Borrow ID <span>| <?php echo $rowBorrow['Borrow_ID'] ?></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal-medical"></i>
                  </div>
                  <div class="ps-3">
                    <h6> <?php echo $rowBorrow['Book_Name']?> </h6>
                    <span class="text-success small pt-1 fw-bold">Return on or before: </span> <span
                      class="text-muted small pt-2 ps-1"><?php 
                      $date = $rowBorrow['Return_Date'];
                      $formattedDate = date("F d, Y", strtotime($date));

                      echo $formattedDate
                      ?></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <?php
            
          endwhile;
        }
        else{
          
        
          ?>
          <!-- Dashboard Cards -->
          <div class="col-xxl-12 col-md-12">
            <div class="card info-card revenue-card">



              <div class="card-body">
                <h5 class="card-title">Nothing to worry</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal-check"></i>
                  </div>
                  <div class="ps-3">
                    <h6> You are free of charge </h6>
                    <span class="text-success small pt-1 fw-bold">Borrow latest book now!</span> <span
                      class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <?php
          }?>
         
        </div>
      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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