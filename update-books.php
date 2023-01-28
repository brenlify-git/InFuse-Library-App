<?php 

include 'connection.php';


$sql = "SELECT * FROM tbl_bookinfo WHERE Status = 'AVAILABLE' OR Status = 'UNAVAILABLE' ORDER BY Accession_ID DESC ";

$id = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InFuse | Updating Book</title>
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
              <form class="row g-3" action="update.php" method="POST">

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Accession ID</label>
                  <input type="number" class="form-control" id="accesionID" name="Accession_ID" required readonly>
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Call Number</label>
                  <input type="number" class="form-control" id="cNum" name="Call_Number" required>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Book Name</label>
                  <input type="text" class="form-control" id="bName" name="Book_Name" required>
                </div>

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Book Author(s)<b
                      style="color:#026ab2; font-size:12px; font-style:italic"> separate using commas</b> </label>
                  <input type="text" class="form-control" id="bAuthors" placeholder="William Shakespeare, Josh Mulle"
                    name="Book_Author" required>
                </div>

                <div class="col-6">
                  <label for="inputDate" class="form-label">Year Published</label>
                  <div class="col-sm-12">
                    <input type="date" class="form-control" id="date" name="Year_Published" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">ISBN</label>
                  <input type="number" class="form-control" id="isbnNum" name="ISBN" required>
                </div>

                <div class="col-6">
                  <label class="col-sm-7 form-label">Genre</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="genre" name="Genre" required>
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


                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Series</label>
                  <input type="number" class="form-control" id="series" placeholder="2014" name="Series" required>
                </div>
                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Price</label>
                  <input type="number" class="form-control" min="1" step="any" id="price" placeholder="567.00"
                    name="Price" required>
                </div>
                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Copies</label>
                  <input type="number" class="form-control" id="copies" placeholder="5" name="Copies" required>
                </div>
                <div class="col-4">
                  <label for="inputAddress5" class="form-label">Publisher</label>
                  <input type="text" class="form-control" id="publisher" placeholder="Book Shelf Inc." name="Publisher"
                    required>
                </div>

                <div class="col-6">
                  <label class="col-sm-3 form-label">Status</label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" id="status" name="Status">
                      <option value="AVAILABLE">AVAILABLE</option>
                      <option value="UNAVAILABLE">UNAVAILABLE</option>
                      <option value="PULLED-OUT" disabled>PULLED-OUT</option>
                    </select>
                  </div>
                </div>

                <div class="col-6">
                  <label for="inputAddress5" class="form-label">Notes</label>
                  <textarea type="number" class="form-control" id="notes" placeholder="Cover page has dirt marks."
                    required name="Notes"></textarea>
                </div>

                <div class="d-flex align-items-baseline">

                  <div class="update col-6">
                    <button type="submit" class="btn btn-primary col-12" name="updateData"><i
                        class="bi bi-pencil-square"></i> Update</button>
                  </div>

                  <div class="reset col-6 ms-2">
                    <button type="reset" class="btn btn-success col-12" id="liveToastBtn"><i class="bi bi-arrow-clockwise"></i>
                      Reset</button>
                  </div>
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
                  <table class="table  table-hover table-bordered text-center"
                    style="max-height: 625px; overflow: auto; display: inline-block;" id="table">
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
                  <!-- End Table with stripped rows -->

              </form>




            </div>

            


    </section>

  </main><!-- End #main -->


  <div class="toast-container position-fixed top-0 end-0 p-3" id="toasters">
<div class="toast align-items-center text-bg-success border-0 pt-2 ps-4" role="alert" id="liveToast2" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      <h6>Updated</h6>
    </div>
    <button type="button" class="btn-close btn-close-white me-2 pt-4 " data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
</div>

<div class="toast-container position-fixed top-0 end-0 p-3" id="toasters">
<div class="toast align-items-center text-bg-success border-0 pt-2 ps-4" role="alert" id="liveToast" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      <h6>All fields succesfully cleared!</h6>
    </div>
    <button type="button" class="btn-close btn-close-white me-2 pt-4 " data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
</div>

  <script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toast1 = document.getElementById('liveToast')
    const toast2 = document.getElementById('liveToast2')
    if (toastTrigger) {
      toastTrigger.addEventListener('click', () => {
        const toast = new bootstrap.Toast(toast1)

        toast.show()
      })
    }
    if (toastTrigger) {
      toastTrigger.addEventListener('click', () => {
        const toast = new bootstrap.Toast(toast2)

        toast.show()
      })
    }
  </script>



  <div class="toast-container position-static">
  <div class="toast" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="assets/img/logo.png" class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small class="text-muted">just now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      See? Just like this.
    </div>
  </div>

  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small class="text-muted">2 seconds ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Heads up, toasts will stack automatically
    </div>
  </div>
</div>



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