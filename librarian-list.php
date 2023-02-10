<?php 

include 'connection.php';

$sql = "SELECT * FROM tbl_librarianaccess ORDER BY id DESC";

$id = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Librarian Masterlist</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
      <h1>Librarian's Master List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Records</li>
          <li class="breadcrumb-item active">Librarian's Master List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

           <!-- table starts here -->
           <form action="process-patrons.php" method="post">

           <div class="card"> 
            <div class="card-body">
            <button type="submit" name="submit" class="btn btn-primary mt-3" style="float: right;">
              <i class="bi bi-file-earmark-spreadsheet"></i>
              Export
              </button>
              <h5 class="card-title ">Sorted according to the librarians that is registered.</h5>

              <div class="overflow-auto mt-4">
             
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover table-bordered text-nowrap text-center" style="max-height: 600px; overflow: auto; display: inline-block;">
                <thead class="table-secondary" style="position:sticky; top: 0 ;">
                    <tr>
                      <th scope="col">QR Code</th>
                      <th scope="col">Employee ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Middle Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Contact Number</th>
                      <th scope="col">Address</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                  while($tbl_patrons = mysqli_fetch_assoc($id)):   
                ?>
                    <tr>
                      <td><img src="<?= $tbl_patrons['qrcode'];?>" alt=""></td>
                      <th scope="row"><?= $tbl_patrons['empID'];?></th>
                      <td><?= $tbl_patrons['firstname'];?></td>
                      <td><?= $tbl_patrons['middlename'];?></td>
                      <td><?= $tbl_patrons['lastName'];?></td>
                      <td><?= $tbl_patrons['email'];?></td>
                      <td><?= $tbl_patrons['contactNumber'];?></td>
                      <td><?= $tbl_patrons['street'];?>, <?= $tbl_patrons['barangay'];?>,
                        <?= $tbl_patrons['municipality'];?>, <?= $tbl_patrons['province'];?> </td>
                 
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