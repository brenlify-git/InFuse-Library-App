<?php 

include 'connection.php';

$sql = "SELECT * FROM tbl_bookinfo WHERE Status = 'AVAILABLE' OR Status = 'UNAVAILABLE' ORDER BY Accession_ID DESC ";

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
  <link href="assets/img/logo.png" rel="icon">
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
  <link rel="stylesheet" href="assets/css/table.css">

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar.php';?>
  <?php include 'sidebar.php';?>

  <!-- End Sidebar and Header-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Book Master List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Records</li>
          <li class="breadcrumb-item active">Book Master List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <!-- table starts here -->
      
                <div class="card"> 
                  <div class="card-body">
                  <form action="process.php" method="post" enctype="multipart/form-data">

                  <button type="submit" name="submit" class="btn btn-primary mt-3" style="float: right;">
                    <i class="bi bi-file-earmark-spreadsheet"></i>
                    Export
                    </button>
                    <h2 class="card-title ">Sorted using the books that is available</h2>


                    <div class="overflow-auto mt-4">

                    <!-- Table with stripped rows -->
                    <table class="table table-hover datatable table-bordered text-nowrap text-center" style="max-height: 600px; overflow: auto; display: inline-block;">
                      <thead class="table-secondary" style="position:sticky; top: 0 ;">
                        <tr>
                          <th scope="col">Qr Code</th>
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
                      </thead>
                      <tbody>

                      <?php
                        while($tbl_bookinfo = mysqli_fetch_assoc($id)):   
                      ?>
                        <tr>
                          <td><img src="<?= $tbl_bookinfo['Barcode'];?>" alt=""></td>
                          <th><?= $tbl_bookinfo['Accession_ID'];?></th>
                          <td><?= $tbl_bookinfo['Call_No'];?></td>
                          <td><?= $tbl_bookinfo['Book_Name'];?></td>
                          <td><?= $tbl_bookinfo['Book_Author'];?></td>
                          <td><?= $tbl_bookinfo['Year_Published'];?></td>
                          <td><?= $tbl_bookinfo['ISBN'];?></td>
                          <td><?= $tbl_bookinfo['Notes'];?></td>
                          <td><?= $tbl_bookinfo['Genre'];?></td>
                          <td><?= $tbl_bookinfo['Series'];?></td>
                          <td><?= $tbl_bookinfo['Price'];?></td>
                          <td><?= $tbl_bookinfo['Publisher'];?></td>
                          <td><?= $tbl_bookinfo['Copies'];?></td>
                          <td><?= $tbl_bookinfo['Status'];?></td>
                        
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