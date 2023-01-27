<?php 

include 'connection.php';

$sql = "SELECT * FROM tbl_bookborrow INNER JOIN tbl_patrons ON tbl_bookborrow.Library_ID = tbl_patrons.Library_ID INNER JOIN tbl_bookinfo ON tbl_bookborrow.Accession_ID = tbl_bookinfo.Accession_ID  WHERE tbl_bookborrow.Status = 'NOT RETURNED' ORDER BY Borrow_Date;";
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
      <h1>Book Return</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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
              <form class="row g-3" action="return-process.php" method="post">

                <div class="col-4">
                  <label for="inputEmail5" class="form-label">Library ID</label>
                  <input type="number" class="form-control" id="libraryID" name="libraryID" required>
                </div>
                <div class="col-4">
                  <label for="inputEmail5" class="form-label">Borrow ID</label>
                  <input type="number" class="form-control" id="borrowID" name="borrowID" required>
                </div>
                <div class="col-4">
                  <label for="inputEmail5" class="form-label">Accession ID</label>
                  <input type="number" class="form-control" id="accessionID" name="accessionID" required>
                </div>
                <div class="col-4">
                  <label for="inputPassword5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>
                <div class="col-4">
                  <label for="inputPassword5" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="middleName" name="middleName" required>
                </div>
                <div class="col-4">
                  <label for="inputPassword5" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword5" class="form-label">Book Name</label>
                  <input type="text" class="form-control" id="bookName" name="bookName" required>
                </div>

                <div class="col-6">
                  <label for="inputPassword5" class="form-label">Borrow Date</label>
                  <input type="date" class="form-control" id="borrowDate" name="borrowDate" required>
                </div>
                <div class="col-6">
                  <label for="inputPassword5" class="form-label">Due Fee</label>
                  <input type="number" class="form-control"  min="0" pattern="^[0-9]{3,}.[0-9]{2}" id="dueFee" name="dueFee" required>
                  <div class="mt-2">
                    <input class="form-check-input " type="checkbox" value="" name="admin" id="admin" onchange="disableTextbox()">
                    <label class="form-check-label" for="flexCheckDefault">
                      No Violation
                    </label>
                  </div>
                </div>

                <script>
                  function disableTextbox() {
                    var checkbox = document.getElementById("admin");
                    var textbox = document.getElementById("dueFee");
              
                    if (checkbox.checked) {
                      $backup = textbox.value;
                      textbox.value = "0";
                      
                    } else {
          
                      textbox.value = $backup;
                      
                    }
                  }
                </script>
                
                <div class="emptyspace"></div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary ">+ Return Book</button>
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
              <h2 class="card-title">Masterlist of Book Borrow <span>| Sorted by date borrowed</span></h2>


              <div class="overflow-auto mt-4">

                <!-- Table with stripped rows -->
                <table class="table table-hover table-bordered text-nowrap text-center" style="max-height: 360px; overflow: auto; display: inline-block;" id="table">
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



                </form><!-- End Multi Columns Form -->

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

  <script>
    var table = document.getElementById('table');

    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function () {
        document.getElementById("libraryID").value = this.cells[5].innerHTML;
        document.getElementById("borrowID").value = this.cells[0].innerHTML;
        document.getElementById("accessionID").value = this.cells[3].innerHTML;
        document.getElementById("firstName").value = this.cells[7].innerHTML;
        document.getElementById("middleName").value = this.cells[8].innerHTML;
        document.getElementById("lastName").value = this.cells[9].innerHTML;
        document.getElementById("bookName").value = this.cells[4].innerHTML;
        document.getElementById("borrowDate").value = this.cells[2].innerHTML;
        document.getElementById("dueFee").value = this.cells[1].innerHTML;

        console.log(rows[i]);

      };
    }
  </script>

</body>

</html>