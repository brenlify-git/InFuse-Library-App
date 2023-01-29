<?php 

include 'connection.php';



$Penalties = $_POST['penalties'];
$Payment = $_POST['payment'];
$LibraryID = $_POST['libraryid'];
$BorrowID = $_POST['borrowid'];
$FirstName = $_POST['firstname'];
$MiddleName = $_POST['middlename'];
$LastName = $_POST['lastname'];
$PatronType = $_POST['type'];
$ContactNumber = $_POST['contactnumber'];
$Department = $_POST['department'];
$Section = $_POST['section'];
$Address = $_POST['Address'];

  $Balance = $Penalties - $Payment;
  $Change = $Payment - $Penalties;

  if($Balance<0){
    $Balance = 0.00;
  }
  if($Payment < $Penalties){
    $Change = 0;
  }


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

  <?php include 'headerbar.php';?>
  <?php include 'sidebar.php';?>

  <!-- End Sidebar and Header-->

  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Payment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="payment.php">Payment</a></li>
          <li class="breadcrumb-item active">Payment Waiting</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Patron's with Penalties Details</h5>


              <!-- Multi Columns Form -->
              <form class="row g-3" method="post" action="payment-processcomplete.php">
                
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Library ID</label>
                  <input type="number" class="form-control" id="libraryid" name="libraryid"  value="<?= $LibraryID ?>" required >
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Borrow ID</label>
                  <input type="number" class="form-control" id="borrowid"  value="<?= $BorrowID ?>" required >
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstname"  value="<?= $FirstName ?>" required >
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="middlename"  value="<?= $MiddleName ?>" required >
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastname"  value="<?= $LastName ?>" required >
                </div>
                <div class="col-md-6">
                  <label class="col-sm-7 form-label">Patron Type</label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" id="type" value="<?= $PatronType ?>" required >
                  <option selected disabled value="<?= $Section ?>"><?= $Section ?></option>
                    
                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Contact Number</label>
                  <input type="number" class="form-control" id="contactnumber"  value="<?= $ContactNumber ?>" required >
                </div>
                <div class="col-md-6">
                  <label class="col-sm-7 form-label">Department</label>
                  <div class="col-sm-12">
                  <select class="form-select" aria-label="Default select example" id="department"   required >
                      <option selected disabled value="<?= $Department ?>"><?= $Department ?></option>
                       
                  
                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Section</label>
                  <input type="text" class="form-control" id="section"  value="<?= $Section ?>" required >
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address"  value="<?= $Address ?>"  required >
                </div>

                

               
                <h5 class="card-title">Payment Process</h5>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Patron's Balance</label>
                  <input type="number" class="form-control bg-primary opacity-75 text-light" id="penalties" name="penalties"  min="1" value="<?= $Balance ?>" step="any" required readonly >
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Payment</label>
                  <input type="number" class="form-control bg-danger opacity-75 text-light" min="1" step="any" value="<?= $Payment ?>" readonly required>
                </div>

                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Change</label>
                  <input type="number" class="form-control bg-success opacity-75 text-light"  min="1" step="any" value="<?= $Change ?>" readonly  required>
                </div>

                <div class="col-md-4">
                 
                </div>

                <div class="col-md-4">
              
                  <button type="submit" class="form-control btn btn-secondary"><i class="bi bi-wallet2"></i> &nbsp Process Complete</button>
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