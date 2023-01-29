<?php 
include 'connection.php';
$sql = "SELECT * FROM tbl_bookinfo WHERE Status='AVAILABLE' ORDER BY Call_No DESC ";
$id = $conn->query($sql);
$sql2 = "SELECT * FROM tbl_patrons WHERE Penalty = 0.00 AND Library_ID != '1000' AND Borrow_Count >0";
$id2 = $conn->query($sql2);
$sql3 = "SELECT * FROM tbl_patrons WHERE Penalty = 0.00 AND Library_ID != '1000'";
$id3 = $conn->query($sql3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>InFuse | Book Borrowing</title>
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script> -->
  <!-- <script type="text/javascript">
    $(document).ready(function () {
      $("#LibraryID").change(function () {
        var aid = $("#LibraryID").val();
        $.ajax({
          url: 'datapass.php',
          method: 'post',
          data: 'aid=' + aid
        }).done(function (tbl_patrons) {
          console.log(tbl_patrons);
          tbl_patrons = JSON.parse(tbl_patrons);
          tbl_patrons.forEach(function (tbl_patrons) {
            $('#firstName').append('<option> ' + tbl_patrons.FirstName + '</option>')
          })
        })
      })
    })
  </script> -->
</head>

<body>
  <!-- ======= Sidebar and Header ======= -->
  <?php include 'headerbar-librarian.php';?>
  <?php include 'sidebar-librarian.php';?>
  <!-- End Sidebar and Header-->
  
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Book Borrow</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard-librarian.php">Home</a></li>
          <li class="breadcrumb-item">Book Acquisition</li>
          <li class="breadcrumb-item active">Book Borrow</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <form action="borrow-process-librarian.php" method="post">
      <section class="section">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Insert Patron's Details</h5>
                <!-- Multi Columns Form -->
                <div class="row g-3">
                  <div class="col-6">
                    <label class="col-sm-7 form-label">Patron ID</label>
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" id="patronID" name="patronID"
                        required>
                        <option selected disabled>Select using ID</option>
                        <?php while($rows3 = mysqli_fetch_array($id3)){
                      ?>

                      <option value="<?= $rows3['Library_ID'];?>"><?= $rows3['Library_ID'];?></option>

                      <?php
                      } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="inputPassword5" class="form-label">Borrow Count</label>
                    <input type="text" class="form-control" id="borrowCount" name="borrowCount" readonly required>
                  </div>
                  <div class="col-4">
                    <label for="inputPassword5" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName"  required>
                  </div>
                  <div class="col-4">
                    <label for="inputPassword5" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" required>
                  </div>
                  <div class="col-4">
                    <label for="inputPassword5" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" required>
                  </div>
                  <div class="col-6">
                    <label class="col-sm-7 form-label">Patron Type</label>
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" id="type" required>
                      <option selected disabled>Select type</option>
                        <option value="PATRON">Patron</option>
                    
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="inputPassword5" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="contact"  required>
                  </div>
                  <div class="col-6">
                    <label class="col-sm-7 form-label">Department</label>
                    <div class="col-sm-12">
                      <select class="form-select" aria-label="Default select example" id="department" required>
                      <option selected disabled>Select department</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSPSYCH">BSPSYCH</option>
                        <option value="BSBA">BSBA</option>
                        <option value="BSCE">BSCE</option>
                        <option value="BSHM">BSHM</option>
                  
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="inputPassword5" class="form-label">Section</label>
                    <input type="text" class="form-control" id="section" required>
                  </div>
                  <div class="col-12">
                    <label for="inputAddress5" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" placeholder="William Shakespeare"
                      required>
                  </div>
                  <div class="col-12">
                    <label for="inputAddress5" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="barangay" placeholder="William Shakespeare"
                      required>
                  </div>
                  <div class="col-12">
                    <label for="inputAddress5" class="form-label">Municipality</label>
                    <input type="text" class="form-control" id="municipality" placeholder="Book Shelf Inc." required>
                  </div>
                  <div class="col-12">
                    <label for="inputAddress5" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" placeholder="Book Shelf Inc." required>
                  </div>
                </div><!-- End Multi Columns Form -->
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- table starts here -->
            <div class="card">
              <div class="card-body">
              <h5 class="card-title">Patron's Details <span class="">(Sort according to ID)</span></h5>
                <table class="table table-hover table-bordered text-nowrap text-center "
                  style="max-height: 650px; overflow: auto; display: inline-block;" id="tblpatron">
                  <thead class="table-dark" style="position:sticky; top: 0 ;">
                    <tr>
                      <th scope="col">Student ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Middle Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Patron Type</th>
                      <th scope="col">Contact Number</th>
                      <th scope="col">Department</th>
                      <th scope="col">Section</th>
                      <th scope="col">Borrow Count</th>
                      <th scope="col">Street</th>
                      <th scope="col">Barangay</th>
                      <th scope="col">Municipality</th>
                      <th scope="col">Province</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        while($tbl_patrons = mysqli_fetch_assoc($id2)):   
                      ?>
                    <tr>
                      <th scope="row"><?= $tbl_patrons['Library_ID'];?></th>
                      <td><?= $tbl_patrons['FirstName'];?></td>
                      <td><?= $tbl_patrons['MiddleName'];?></td>
                      <td><?= $tbl_patrons['LastName'];?></td>
                      <td><?= $tbl_patrons['Patron_Type'];?></td>
                      <td><?= $tbl_patrons['Contact_Number'];?></td>
                      <td><?= $tbl_patrons['Department'];?></td>
                      <td><?= $tbl_patrons['Section'];?></td>
                      <td><?= $tbl_patrons['Borrow_Count'];?></td>
                      <td><?= $tbl_patrons['Street'];?></td>
                      <td><?= $tbl_patrons['Barangay'];?></td>
                      <td><?= $tbl_patrons['Municipality'];?></td>
                      <td><?= $tbl_patrons['Province'];?></td>
                    </tr>
                    <?php
                endwhile;
                ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Insert Book's Details</h5>
                  <!-- Multi Columns Form -->
                  <div class="row g-4">
                  <div class="col-md-6">
                      <label for="inputEmail5" class="form-label">Accession Number</label>
                      <input type="number" class="form-control" id="accNum" name="accNum" required>
                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail5" class="form-label">Call Number</label>
                      <input type="number" class="form-control" id="callNumber" name="callNumber" required>
                    </div>
                    <div class="col-md-12">
                      <label for="inputPassword5" class="form-label">Book Name</label>
                      <input type="text" class="form-control" id="bName" required>
                    </div>
                    <div class="col-12">
                      <label for="inputAddress5" class="form-label">Book Author(s)</label>
                      <input type="text" class="form-control" id="bAuthor" placeholder="William Shakespeare"
                        required>
                    </div>
                    <div class="col-6">
                      <label for="inputDate" class="form-label">Year Published</label>
                      <div class="col-sm-12">
                        <input type="date" class="form-control" id="yearPub" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="inputAddress5" class="form-label">ISBN</label>
                      <input type="number" class="form-control" id="ISBN" placeholder="William Shakespeare"
                        required>
                    </div>
                  
                    <div class="col-12">
                      <label class="col-sm-7 form-label">Genre</label>
                      <div class="col-sm-12">
                        <select class="form-select" aria-label="Default select example" id="genre" name="Genre"
                          required>
                          <option selected disabled>Select book genre</option>
                          <option value="Adventure stories">Adventure stories</option>
                          <option value="Classics">Classics</option>
                          <option value="Crime">Crime</option>
                          <option value="Fairy tales, fables, and folk tales">Fairy tales, fables, and folk tales</option>
                          <option value="Fantasy">Fantasy</option>
                          <option value="Historical fiction">Historical fiction</option>
                          <option value="Horror">Horror</option>
                          <option value="Humour and satire">Humour and satire</option>
                          <option value="Literary fiction">Literary fiction</option>
                          <option value="Mystery">Mystery</option>
                          <option value="Poetry">Poetry</option>
                          <option value="Plays">Plays</option>
                          <option value="Biography">Biography</option>
                          <option value="Romance">Romance</option>
                          <option value="Science Fiction">Science Fiction</option>
                          <option value="Short stories">Short stories</option>
                          <option value="Thrillers">Thrillers</option>
                          <option value="War">War</option>
                          <option value="Women's Fiction">Women's Fiction</option>
                          <option value="Young Adult">Young Adult</option>
                          <option value="Non-Fiction Novel">Non-Fiction Novel</option>
                          <option value="Autobiography and memoir">Autobiography and memoir</option>
                          <option value="Biography">Biography</option>
                          <option value="Essays">Essays</option>
                          <option value="Self-help">Self-help</option>
                          <option value="Cookbook">Cookbook</option>
                          <option value="Art">Art</option>
                          <option value="Development">Development</option>
                          <option value="Motivational">Motivational</option>
                          <option value="Health">Health</option>
                          <option value="History">History</option>
                          <option value="Travel">Travel</option>
                          <option value="Guide / How-to">Guide / How-to</option>
                          <option value="Families & Relationships">Families & Relationships</option>
                          <option value="Humor">Humor</option>
                          <option value="Action">Action</option>
                          <option value="Architecture">Architecture</option>
                          <option value="Alternate history">Alternate history</option>
                          <option value="Anthology">Anthology</option>
                          <option value="Chick lit">Chick lit</option>
                          <option value="Business/economics">Business/economics</option>
                          <option value="Children's Fiction">Children's Fiction</option>
                          <option value="Crafts/hobbies">Crafts/hobbies</option>
                          <option value="Comic book">Comic book</option>
                          <option value="Coming-of-age">Coming-of-age</option>
                          <option value="Dictionary">Dictionary</option>
                          <option value="Encyclopedia">Encyclopedia</option>
                          <option value="Drama">Drama</option>
                          <option value="Fitness">Fitness</option>
                          <option value="Graphic novel">Graphic novel</option>
                          <option value="Home and Garden">Home and Garden</option>
                          <option value="Mystery">Mystery</option>
                          <option value="Philosophy">Philosophy</option>
                          <option value="Political">Political</option>
                          <option value="Religion, spirituality, and new age">Religion, spirituality, and new age
                          </option>
                          <option value="Satire">Satire</option>
                          <option value="True crime">True crime</option>
                          <option value="Suspense">Suspense</option>
                          <option value="Sports and leisure">Sports and leisure</option>
                          <option value="Western">Western</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="inputAddress5" class="form-label">Series</label>
                      <input type="number" class="form-control" id="series" placeholder="2014" required>
                    </div>
                    <div class="col-6">
                      <label for="inputAddress5" class="form-label">Price</label>
                      <input type="number" class="form-control" id="price" min="1" step="any" placeholder="567.00" required>
                    </div>
                    <div class="col-6">
                      <label for="inputAddress5" class="form-label">Publisher</label>
                      <input type="text" class="form-control" id="publisher" placeholder="Book Shelf Inc." required>
                    </div>
                    <div class="col-6">
                      <label class="col-sm-3 form-label">Status</label>
                      <div class="col-sm-12">
                        <select class="form-select" id="status2" aria-label="Default select example">
                          <option value="AVAILABLE">AVAILABLE</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="inputAddress5" class="form-label">Notes</label>
                      <textarea type="number" class="form-control" id="notes"
                        placeholder="Cover page has dirt marks." required></textarea>
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary ">+ Borrow Book</button>
                      <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                  </div><!-- End Multi Columns Form -->
    </form>
    </div>
    </div>
    </div>
    <div class="col-6">
      <!-- table starts here -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Book's Details <span class="">(Sort according to Call Number)</span></h5>
          <table class="table table-hover table-bordered  text-center"
            style="max-height: 785px; overflow: auto; display: inline-block;" id="tblbook">
            <thead class="table-dark" style="position:sticky; top: 0 ;">
              <tr>
                <th scope="col">Accession ID</th>
                <th scope="col">Call Number</th>
                <th scope="col">Book Name</th>
                <th scope="col">Book Author</th>
                <th scope="col">Published Date</th>
                <th scope="col">ISBN</th>
                <th scope="col">Notes</th>
                <th scope="col">Subject</th>
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
                <th scope="row"><?= $tbl_bookinfo['Accession_ID'];?></th>
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
          </form>
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
    var table = document.getElementById('tblpatron');

    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function () {
        document.getElementById("patronID").value = this.cells[0].innerHTML;
        document.getElementById("firstName").value = this.cells[1].innerHTML;
        document.getElementById("middleName").value = this.cells[2].innerHTML;
        document.getElementById("lastName").value = this.cells[3].innerHTML;
        document.getElementById("type").value = this.cells[4].innerHTML;
        document.getElementById("contact").value = this.cells[5].innerHTML;
        document.getElementById("department").value = this.cells[6].innerHTML;
        document.getElementById("section").value = this.cells[7].innerHTML;
        document.getElementById("borrowCount").value = this.cells[8].innerHTML;
        document.getElementById("street").value = this.cells[9].innerHTML;
        document.getElementById("barangay").value = this.cells[10].innerHTML;
        document.getElementById("municipality").value = this.cells[11].innerHTML;
        document.getElementById("province").value = this.cells[12].innerHTML;
     
        console.log(rows[i]);

      };
    }
  </script>


<script>
    var table2 = document.getElementById('tblbook');

    for (var i = 1; i < table2.rows.length; i++) {
      table2.rows[i].onclick = function () {
        document.getElementById("accNum").value = this.cells[0].innerHTML;
        document.getElementById("callNumber").value = this.cells[1].innerHTML;
        document.getElementById("bName").value = this.cells[2].innerHTML;
        document.getElementById("bAuthor").value = this.cells[3].innerHTML;
        document.getElementById("yearPub").value = this.cells[4].innerHTML;
        document.getElementById("ISBN").value = this.cells[5].innerHTML;
        document.getElementById("genre").value = this.cells[7].innerHTML;
        document.getElementById("series").value = this.cells[8].innerHTML;
        document.getElementById("price").value = this.cells[9].innerHTML;
        document.getElementById("publisher").value = this.cells[10].innerHTML;
        document.getElementById("status2").value = this.cells[12].innerHTML;
        document.getElementById("notes").value = this.cells[6].innerHTML;
     
        console.log(rows[i]);

      };
    }
  </script>



</body>

</html>