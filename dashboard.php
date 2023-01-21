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


$countCategory = mysqli_query($conn, "SELECT COUNT(DISTINCT Genre) AS category  FROM tbl_bookinfo");
$row_countCat = mysqli_fetch_assoc($countCategory);
$countCat = $row_countCat["category"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Admin</title>
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

  <?php include 'headerbar.php';?>
  <?php include 'sidebar.php';?>

  <!-- End Sidebar and Header-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Dashboard Cards -->
            <div class="col-xxl-4 col-md-12">
              <div class="card info-card revenue-card">



                <div class="card-body">
                  <h5 class="card-title">Students <span>| Registered</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $countStud;?> </h6>
                      <span class="text-success small pt-1 fw-bold">ADMIN</span> <span
                        class="text-muted small pt-2 ps-1">ONLY</span>

                    </div>
                  </div>
                </div>




              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-12">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Faculties <span>| Registered</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-workspace"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $countFact;?> </h6>
                      <span class="text-success small pt-1 fw-bold">ADMIN</span> <span
                        class="text-muted small pt-2 ps-1">ONLY</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12 availBook">

              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Category <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journals"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $countCat;?> </h6>
                      <span class="text-success small pt-1 fw-bold">ADMIN</span> <span
                        class="text-muted small pt-2 ps-1">ONLY</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->



            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-12">
              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Issued <span>| Book Borrow</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-arrow-up"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $countBor;?> </h6>
                      <span class="text-danger small pt-1 fw-bold">ADMIN</span> <span
                        class="text-muted small pt-2 ps-1">ONLY</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Returned <span>| Book Return</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-arrow-down"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $countRt;?> </h6>
                      <span class="text-danger small pt-1 fw-bold">ADMIN</span> <span
                        class="text-muted small pt-2 ps-1">ONLY</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-12">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Available Book <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $countAvail;?> </h6>
                      <span class="text-success small pt-1 fw-bold">ADMIN</span> <span
                        class="text-muted small pt-2 ps-1">ONLY</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->



            

          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                  <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-2.jpg" alt="">
                  <h4><a href="#">Quidem autem et impedit</a></h4>
                  <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-3.jpg" alt="">
                  <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-4.jpg" alt="">
                  <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                  <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-5.jpg" alt="">
                  <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                  <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

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