<?php 

include 'connection.php';

$sql = "SELECT tbl_bookborrow.Borrow_ID, Due_Fee, Borrow_Date,tbl_bookinfo.Accession_ID, Book_Name,tbl_patrons.Library_ID, Student_ID, FirstName, MiddleName, LastName, Patron_Type, Contact_Number, Penalty, Department, Section, Street, Barangay, Municipality, Province FROM (((tbl_patrons INNER JOIN tbl_bookreturn ON tbl_patrons.Library_ID = tbl_bookreturn.Library_ID) INNER JOIN tbl_bookinfo ON tbl_bookreturn.Accession_ID = tbl_bookinfo.Accession_ID) INNER JOIN tbl_bookborrow ON tbl_bookreturn.Borrow_ID = tbl_bookborrow.Borrow_ID);";
$id = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Payment</title>
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
      <h1>Payment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-librarian.php">Home</a></li>
          <li class="breadcrumb-item active">Payment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Patron's with Penalties Details</h5>


              <!-- Multi Columns Form -->
              <form class="row g-3">
                
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Library ID</label>
                  <input type="number" class="form-control" id="inputEmail5" required>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Borrow ID</label>
                  <input type="number" class="form-control" id="inputEmail5" required>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="inputPassword5" required>
                </div>
                <div class="col-md-12">
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
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                
                
               
                <div class="text-right">
                  <button type="submit" class="btn btn-primary ">+ Pay</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <!-- table starts here -->

          <div class="card"> 
                  <div class="card-body">
                
                    <h2 class="card-title ">Members Masterlist</h2>


                    <form name="excel.php" method="post">

                    <div class="overflow-auto mt-4">
                  
                    <!-- Table with stripped rows -->
              <table class="table table-hover table-bordered text-nowrap text-center" style="max-height: 675px; overflow: auto; display: inline-block;">
                <thead class="table-dark" style="position:sticky; top: 0 ;">
                  <tr>
                    <th scope="col">Borrow ID</th>
                    <th scope="col">Due Fee</th>
                    <th scope="col">Borrow Date</th>
                    <th scope="col">Accession ID</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Library ID</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Penalty</th>
                    <th scope="col">Department</th>
                    <th scope="col">Section</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                  while($tbl_bookborrow = mysqli_fetch_assoc($id)):   
                ?>
                  <tr>
                    <td scope="row"><?= $tbl_bookborrow['Borrow_ID'];?></td>
                    <td><?= $tbl_bookborrow['Due_Fee'];?></td>
                    <td><?= $tbl_bookborrow['Borrow_Date'];?></td>
                    <td><?= $tbl_bookborrow['Accession_ID'];?></td>
                    <td><?= $tbl_bookborrow['Book_Name'];?></td>
                    <td><?= $tbl_bookborrow['Library_ID'];?></td>
                    <td><?= $tbl_bookborrow['Student_ID'];?></td>
                    <td><?= $tbl_bookborrow['FirstName'];?></td>
                    <td><?= $tbl_bookborrow['MiddleName'];?></td>
                    <td><?= $tbl_bookborrow['LastName'];?></td>
                    <td><?= $tbl_bookborrow['Patron_Type'];?></td>
                    <td><?= $tbl_bookborrow['Contact_Number'];?></td>
                    <td><?= $tbl_bookborrow['Penalty'];?></td>
                    <td><?= $tbl_bookborrow['Department'];?></td>
                    <td><?= $tbl_bookborrow['Section'];?></td>
                    <td><?= $tbl_bookborrow['Street'];?>, <?= $tbl_bookborrow['Barangay'];?>,
                      <?= $tbl_bookborrow['Municipality'];?>, <?= $tbl_bookborrow['Province'];?> </td>
                  </tr>

                    <?php
          endwhile;
          ?>

                  </tbody>
                </table>
                    

              </form>
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