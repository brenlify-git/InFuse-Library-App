<?php 


include 'connection.php';



$sql = "SELECT * FROM (((tbl_patrons INNER JOIN tbl_bookreturn ON tbl_patrons.Library_ID = tbl_bookreturn.Library_ID) INNER JOIN tbl_bookinfo ON  tbl_bookreturn.Accession_ID = tbl_bookinfo.Accession_ID) INNER JOIN tbl_bookborrow ON tbl_bookreturn.Borrow_ID = tbl_bookborrow.Borrow_ID)";
$id = $conn->query($sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Patron Masterlist</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar.php';?>
  <?php include 'sidebar.php';?>

  <!-- End Sidebar and Header-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Book Return</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Records</li>
          <li class="breadcrumb-item active">Book Return</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

           <!-- table starts here -->

           <div class="card"> 
            <div class="card-body">
            <button type="submit" name="export_excel" class="btn btn-primary mt-3" style="float: right;">
              <i class="bi bi-file-earmark-spreadsheet"></i>
              Export
              </button>
              <h2 class="card-title">Sorted using the books that is returned.</h2>


              <form name="excel.php" method="post">

              <div class="overflow-auto mt-4">
             
              <!-- Table with stripped rows -->
              <table class="table table-hover table-bordered text-nowrap text-center">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Return ID</th>
                    <th scope="col">Accession ID</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Library ID</th>
                    <th scope="col">Patrons Name</th>
                    <th scope="col">Borrow ID</th>
                    <th scope="col">Date Borrowed</th>
                    <th scope="col">Return Date</th>          
                  </tr>
                </thead>
                <tbody>

                <?php
                  while($tbl_bookreturn = mysqli_fetch_assoc($id)):   
                ?>
                  <tr>
                    <th scope="row"><?= $tbl_bookreturn['Return_ID'];?></th>
                    <td><?= $tbl_bookreturn['Accession_ID'];?></td>
                    <td><?= $tbl_bookreturn['Book_Name'];?></td>
                    <td><?= $tbl_bookreturn['Library_ID'];?></td>
                    <td><?= $tbl_bookreturn['LastName'];?>, <?= $tbl_bookreturn['FirstName'];?> <?= $tbl_bookreturn['MiddleName'];?></td>
                    <td><?= $tbl_bookreturn['Borrow_ID'];?></td>
                    <td><?= $tbl_bookreturn['Borrow_Date'];?></td>
                    <td><?= $tbl_bookreturn['Return_Date'];?></td>
                
                  </tr>

                  <?php
          endwhile;
          ?>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              </form>
            </div>
            </div>
          </div>

         

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  </footer><!-- End Footer -->

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