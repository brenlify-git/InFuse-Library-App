<?php 

include 'connection.php';

//$sql = "SELECT * FROM tbl_patrons INNER JOIN tbl_bookborrow ON tbl_bookborrow.Library_ID = tbl_patrons.Library_ID INNER JOIN tbl_bookreturn ON tbl_bookreturn.Library_ID = tbl_patrons.Library_ID INNER JOIN tbl_bookinfo ON tbl_bookinfo.Accession_ID = tbl_bookreturn.Accession_ID WHERE  tbl_patrons.Penalty >0 AND tbl_patrons.Patron_Type != 'LIBRARIAN' ";


$sql = "SELECT * FROM `tbl_patrons` WHERE Penalty > 0 AND Patron_Type = 'PATRON'";
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
              <h5 class="card-title">Insert Patron's with Penalties Details <?php $outstandingPenalty ?></h5>


              <!-- Multi Columns Form -->
              <form class="row g-3" action="payment-process-librarian.php" method="post">

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Library ID</label>
                  <input type="number" class="form-control" id="libraryid" name="libraryid" required>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Student ID</label>
                  <input type="text" class="form-control" id="studentid" name="studentid" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Middle Name</label>
                  <input type="text" class="form-control" id="middlename" name="middlename" required>
                </div>
                <div class="col-md-4">
                  <label for="inputPassword5" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="col-6">
                  <label class="col-sm-7 form-label">Patron Type</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="type" name="type" required>
                      <option selected disabled>Select type</option>
                      <option value="PATRON">PATRON</option>

                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Contact Number</label>
                  <input type="number" class="form-control" id="contactnumber" name="contactnumber" required>
                </div>
                <div class="col-6">
                  <label class="col-sm-7 form-label">Department</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="department" name="department"
                      required>
                      <option selected disabled>Select department</option>
                      <option disabled value="College of Accountancy, Business and Management">College of Accountancy,
                        Business and Management</option>
                      <option value="BS Accountancy">BS Accountancy</option>
                      <option value="BS Accounting Information System">BS Accounting Information System</option>
                      <option value="BS Business Administration in Financial Management">BS Business Administration in
                        Financial Management</option>
                      <option value="BS Business Administration in Marketing Management">BS Business Administration in
                        Marketing Management</option>
                      <option value="BS Hospitality Management">BS Hospitality Management</option>
                      <option value="BS Tourism Management">BS Tourism Management</option>
                      <option disabled value="College of Arts and Sciences">College of Arts and Sciences</option>
                      <option value="BS Psychology">BS Psychology</option>
                      <option value="Bachelor in Physical Education">Bachelor in Physical Education</option>
                      <option value="Certificate of Professional Education">Certificate of Professional Education
                      </option>
                      <option disabled value="College of Engineering and Technology">College of Engineering and
                        Technology</option>
                      <option value="BS Architecture">BS Architecture</option>
                      <option value="BS Civil Engineering">BS Civil Engineering</option>
                      <option value="BS Computer Engineering">BS Computer Engineering</option>
                      <option value="BS Information Technology">BS Information Technology</option>
                      <option disabled value="Graduate Studies">Graduate Studies</option>
                      <option value="Doctors of Education Major in Educational Management">Doctors of Education Major in
                        Educational Management</option>
                      <option value="Master of Education Major in Educational Management">Master of Education Major in
                        Educational Management</option>
                      <option value="Master of Education Major in Special Education">Master of Education Major in
                        Special Education</option>
                      <option value="Master in Management">Master in Management</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Section</label>
                  <input type="text" class="form-control" id="section" name="section" required>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="Address" required>
                </div>

                <h5 class="card-title">Payment Process</h5>

                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Penalties</label>
                  <input type="number" class="form-control" id="penalties" name="penalties" min="1" step="any" required>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Payment</label>
                  <input type="number" class="form-control" name="payment" min="1" step="any" required>
                </div>




                <div class="text-right">
                  <button type="submit" class="btn btn-primary" name="pay">+ Pay</button>
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
                  <table class="table table-hover table-bordered text-nowrap text-center "
                    style="max-height: 675px; overflow: auto; display: inline-block;" id="members">
                    <thead class="table-dark" style="position:sticky; top: 0 ;">
                      <tr>

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
    var table = document.getElementById('members');

    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function () {
        document.getElementById("libraryid").value = this.cells[0].innerHTML;
        document.getElementById("studentid").value = this.cells[1].innerHTML;
        document.getElementById("firstname").value = this.cells[2].innerHTML;
        document.getElementById("middlename").value = this.cells[3].innerHTML;
        document.getElementById("lastname").value = this.cells[4].innerHTML;
        document.getElementById("type").value = this.cells[5].innerHTML;
        document.getElementById("contactnumber").value = this.cells[6].innerHTML;
        document.getElementById("penalties").value = this.cells[7].innerHTML;
        document.getElementById("department").value = this.cells[8].innerHTML;
        document.getElementById("section").value = this.cells[9].innerHTML;
        document.getElementById("address").value = this.cells[10].innerHTML;

        console.log(rows[i]);

      };
    }
  </script>

</body>

</html>