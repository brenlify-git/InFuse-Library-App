<?php 

include 'connection.php';


$sql = "SELECT * FROM tbl_maintenance";

$id = $conn->query($sql);


$sqladmin = "SELECT * FROM tbl_adminaccess";

$idadmin = $conn->query($sqladmin);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Maintenance</title>
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
  <link rel="stylesheet" href="assets/css/table.css">

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar.php';?>
  <?php include 'sidebar.php';?>

  <!-- End Sidebar and Header-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Miantenance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Maintenance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Book Maintenance</h5>

              <?php
                  while($rows = mysqli_fetch_assoc($id)):   
                ?>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="maintenance-process.php" method="post">
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Allowed Books to Borrow</label>
                  <input type="number" class="form-control" id="inputName5" min="1" max="10" name="numBook"
                    value="<?= $rows['Allowed_BookBorrow'];?>" required>
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Allowed Book days to Borrow</label>
                  <input type="number" class="form-control" id="inputName5" min="1" max="7" name="numDays"
                    value="<?= $rows['Allowed_BookDays'];?>" required>
                </div>
                <div class="col-md-4">
                  <label for="inputEmail5" class="form-label">Penalty</label>
                  <input type="number" class="form-control" id="inputEmail5" min="1" max="100" name="penalty"
                    value="<?= $rows['Penalty'];?>" required>
                </div>

                <?php
                endwhile;
                ?>



                <div class="text-center">
                  <button type="submit" class="btn btn-primary m-2" name="saveChange">+ Save Changes</button>

                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

        
        <div class="col-lg-12">


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Generate QR Code</h5>

    

    <!-- Multi Columns Form -->
    <form class="row g-3" action="maintenance-process.php" method="post">
      

    <div class="col-4">
                  <label class="col-sm-7 form-label">Librarian</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="LibID" onchange="selectIndex()" name="LibraryID"
                      required>
                      <option selected disabled>Select ID</option>
                      <?php while($admin = mysqli_fetch_array($idadmin)){
                      ?>

                      <option value="<?= $admin['id'];?>"><?= $admin['id'];?></option>

                      <?php
                      } ?>
                    </select>
                  </div>    



      <div class="text-center">
        <button type="submit" class="btn btn-primary m-2" name="saveChange">+ Save Changes</button>

      </div>
    </form><!-- End Multi Columns Form -->

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