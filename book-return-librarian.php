<?php 

include 'connection.php';

$sql = "SELECT * FROM tbl_bookinfo";

$id = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Book Returning</title>
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

  <?php include 'headerbar-librarian.php';?>
  <?php include 'sidebar-librarian.php';?>

  <!-- End Sidebar and Header-->

  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Book Return</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-librarian.php">Home</a></li>
          <li class="breadcrumb-item">Book Acquisition</li>
          <li class="breadcrumb-item active">Book Return</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Patron's Details</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                
                <div class="col-12">
                  <label for="inputEmail5" class="form-label">Student ID</label>
                  <input type="number" class="form-control" id="inputEmail5" required>
                </div>
                <div class="col-4">
                  <label for="inputPassword5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-4">
                  <label for="inputPassword5" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-4">
                  <label for="inputPassword5" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-6">
                  <label class="col-sm-7 form-label">Patron Type</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" required>
                      <option value="1">Student</option>
                      <option value="2">Faculty</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <label for="inputPassword5" class="form-label">Contact Number</label>
                  <input type="number" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-6">
                  <label class="col-sm-7 form-label">Department</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" required>
                      <option value="1">BSIT</option>
                      <option value="2">BSCE</option>
                      <option value="2">BSCpE</option>
                      <option value="2">BSARC</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <label for="inputPassword5" class="form-label">Section</label>
                  <input type="text" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Street</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="William Shakespeare" required>
                </div>
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Barangay</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="William Shakespeare" required>
                </div>
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Municipality</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="Book Shelf Inc." required>
                </div>
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Province</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="Book Shelf Inc." required>
                </div>

                <div class="emptyspace"></div>
                
              </form><!-- End Multi Columns Form -->


            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <!-- table starts here -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Book's Details</h5>


              <!-- Multi Columns Form -->
              <form class="row g-3">
                
                
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Call Number</label>
                  <input type="number" class="form-control" id="inputEmail5" required>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Book Name</label>
                  <input type="text" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Book Author(s)</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="William Shakespeare" required>
                </div>
                
                <div class="col-6">
                    <label for="inputDate" class="form-label">Year Published</label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">ISBN</label>
                  <input type="number" class="form-control" id="inputAddres5s" placeholder="William Shakespeare" required>
                </div>
                <div class="col-6">
                  <label class="col-sm-5 form-label">Subject</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" required>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <label class="col-sm-5 form-label">Category</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example">
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Series</label>
                  <input type="number" class="form-control" id="inputAddres5s" placeholder="2014" required>
                </div>
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Price</label>
                  <input type="number" class="form-control" id="inputAddres5s" placeholder="567.00" required>
                </div>
                
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Publisher</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="Book Shelf Inc." required>
                </div>
                <div class="col-6">
                  <label class="col-sm-3 form-label">Status</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example">
                      <option value="1">Available</option>
                      <option value="2">Unavailable</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Notes</label>
                  <textarea type="number" class="form-control" id="inputAddres5s" placeholder="Cover page has dirt marks." required></textarea>
                </div>
                
               
                <div class="text-right">
                  <button type="submit" class="btn btn-primary ">+ Return Book</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

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