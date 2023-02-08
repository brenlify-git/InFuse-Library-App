<?php 


include 'connection.php';

$sql = "SELECT MAX(CALL_NO) AS LastCallNo FROM tbl_bookinfo";
$result2 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result2);


$Last = $row["LastCallNo"];


$CallNumNew = $Last+1;



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Add Book</title>
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
      <h1>Add Book</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Book Entry</li>
          <li class="breadcrumb-item active">Add Book</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Book Details</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="insert.php" method="post">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Customize ID</label>
                  <input type="number" class="form-control" id="inputName5" name="CustID" value="1" disabled>
                </div>


                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Call Number</label>
                  <input type="number" class="form-control" id="inputEmail5" name="CallNumber"
                    value="<?= $CallNumNew ?>" required>
                </div>


                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Book Name</label>
                  <input type="text" class="form-control" id="inputPassword5" name="BookName" required>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Book Author(s)</label>
                  <input type="text" class="form-control" id="inputAddres5s" name="BookAuthor"
                    placeholder="William Shakespeare" required>
                </div>

                <div class="col-4">
                  <label for="inputDate" class="form-label">Year Published</label>
                  <input type="date" class="form-control" name="YearPublished" required>
                </div>

                <div class="col-4">
                  <label for="inputAddress5" class="form-label">ISBN</label>
                  <input type="number" class="form-control" id="inputAddres5s" name="ISBN"
                    placeholder="1234500000123450000" required>
                </div>

                <div class="col-4">
                  <label class="col-sm-2 form-label">Genre</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="Genre" required>
                      <option disabled class="divider"></option>
 
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
                      <option value="Religion, spirituality, and new age">Religion, spirituality, and new age</option>
                      <option value="Satire">Satire</option>
                      <option value="True crime">True crime</option>
                      <option value="Suspense">Suspense</option>
                      <option value="Sports and leisure">Sports and leisure</option>
                      <option value="Western">Western</option>
                    </select>
                  </div>
                </div>

                

                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Edition</label>
                  <input type="number" class="form-control" id="inputAddres5s" name="Series" placeholder="2014"
                    required>
                </div>

                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Price</label>
                  <input type="text" min="1" step="any" pattern="^[0-9]{3,}.[0-9]{2}" class="form-control" id="inputAddres5s"  name="Price"
                    placeholder="567.00" required>
                </div>


                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Publisher</label>
                  <input type="text" class="form-control" id="inputAddres5s" name="Pulisher"
                    placeholder="Book Shelf Inc." required>
                </div>

                <div class="col-6">
                  <label class="col-sm-3 form-label">Status</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="Status">
                      <option value="AVAILABLE">AVAILABLE</option>
                      <option value="UNAVAILABLE">UNAVAILABLE</option>
                    </select>
                  </div>
                </div>

                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Notes</label>
                  <textarea type="number" class="form-control" style="height: 10px;" id="inputAddres5s"
                    placeholder="Cover page has dirt marks." name="Notes" required></textarea>
                </div>


                <div class="text-right">
                  <button type="submit" class="btn btn-primary" >+ Add Book</button>
                  <button type="reset" class="btn btn-warning" >Reset</button>
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
  <script src="assets/js/toaster.js"></script>
  <script>
    function success_toast(){
      toastr.success("Fields Reset!")
    }
  </script>

</body>

</html>