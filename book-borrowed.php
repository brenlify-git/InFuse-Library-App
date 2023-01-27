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

  <title>InFuse | Book Borrowed</title>
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
      <h1>Book Borrowed</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Records</li>
          <li class="breadcrumb-item active">Book Borrowed</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

            <!-- table starts here -->
            <form action="process-borrowed.php" method="post">

            <div class="card"> 
            <div class="card-body">
            <button type="submit" name="submit" class="btn btn-primary mt-3" style="float: right;">
              <i class="bi bi-file-earmark-spreadsheet"></i>
              Export
              </button>
              <h5 class="card-title ">Sorted using the books that is borrowed.</h5>


              

              <div class="overflow-auto mt-4">
             
              <!-- Table with stripped rows -->
              <table class="table table-hover table-bordered text-nowrap text-center" style="max-height: 675px; overflow: auto; display: inline-block;" id="table">
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

  <script>
    var table = document.getElementById('table');

    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function () {
        document.getElementById("accesionID").value = this.cells[0].innerHTML;
        document.getElementById("cNum").value = this.cells[1].innerHTML;
        document.getElementById("bName").value = this.cells[2].innerHTML;
        document.getElementById("bAuthors").value = this.cells[3].innerHTML;
        document.getElementById("date").value = this.cells[4].innerHTML;
        document.getElementById("isbnNum").value = this.cells[5].innerHTML;
        document.getElementById("series").value = this.cells[8].innerHTML;
        document.getElementById("price").value = this.cells[9].innerHTML;
        document.getElementById("copies").value = this.cells[11].innerHTML;
        document.getElementById("publisher").value = this.cells[10].innerHTML;
        document.getElementById("notes").value = this.cells[6].innerHTML;
        document.getElementById("status").value = this.cells[12].innerHTML;
        document.getElementById("genre").value = this.cells[7].innerHTML;
        console.log(rows[i]);

      };
    }
  </script>

</body>

</html>