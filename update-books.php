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

  <title>InFuse | Patron Masterlist</title>
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
  <link rel="stylesheet" href="assets/css/table.css">

</head>

<body>

  <!-- ======= Sidebar and Header ======= -->

  <?php include 'headerbar.php';?>
  <?php include 'sidebar.php';?>

  <!-- End Sidebar and Header-->

  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Book</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Book Entry</li>
          <li class="breadcrumb-item active">Update Book</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Book Details</h5>


              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Accession ID</label>
                  <input type="number" class="form-control" id="inputName5" required>
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Barcode ID</label>
                  <input type="number" class="form-control" id="inputName5" required>
                </div>
                <div class="col-md-4">
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
                <div class="col-4">
                  <label class="col-sm-7 form-label">Subject</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" required>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <label class="col-sm-7 form-label">Category</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example">
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Series</label>
                  <input type="number" class="form-control" id="inputAddres5s" placeholder="2014" required>
                </div>
                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Price</label>
                  <input type="number" class="form-control" id="inputAddres5s" placeholder="567.00" required>
                </div>
                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Copies</label>
                  <input type="number" class="form-control" id="inputAddres5s" placeholder="5" required>
                </div>
                <div class="col-4">
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
                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Notes</label>
                  <textarea type="number" class="form-control" id="inputAddres5s" placeholder="Cover page has dirt marks." required></textarea>
                </div>
                
               
                <div class="text-right">
                  <button type="submit" class="btn btn-primary ">Submit</button>
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
                
                    <h2 class="card-title ">Sorted using the books that is available</h2>


                    <form name="excel.php" method="post">

                    <div class="overflow-auto mt-4">
                  
                    <!-- Table with stripped rows -->
                    <table class="table table-hover table-bordered  text-center" style="max-height: 675px; overflow: auto; display: inline-block;">
                      <thead class="table-dark" style="position:sticky; top: 0 ;">
                        <tr>
                          <th scope="col">Accession ID</th>
                          <th scope="col">Call Number</th>
                          <th scope="col">Book Name</th>
                          <th scope="col">Book Author</th>
                          <th scope="col">Year Published</th>
                          <th scope="col">ISBN</th>
                          <th scope="col">Notes</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Series</th>
                          <th scope="col">Price</th>
                          <th scope="col">Publisher</th>
                          <th scope="col">Category</th>
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
                          <td><?= $tbl_bookinfo['Subject'];?></td>
                          <td><?= $tbl_bookinfo['Series'];?></td>
                          <td><?= $tbl_bookinfo['Price'];?></td>
                          <td><?= $tbl_bookinfo['Publisher'];?></td>
                          <td><?= $tbl_bookinfo['Category'];?></td>
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