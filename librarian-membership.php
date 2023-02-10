<?php 

include 'connection.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>InFuse | Librarian Membership</title>
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
            <h1>Librarian's Membership</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Librarian's Membership</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Insert Librarian's Details</h5>


                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="add-librarian.php" method="post" enctype="multipart/form-data">

                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" pattern="[0-9]{4}-[0-9]{6}" maxlength="11" title="Format should be like this: 2021-160099" id="inputEmail5" name="empID" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="formFile" class="form-label">Upload Profile Picture</label>
                                    <input class="form-control" type="file" id="formFile" name="profilePicture">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="inputPassword5" name="firstName"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="inputPassword5" name="middleName"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="inputPassword5" name="lastName"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputPassword5" name="email"
                                        required>
                                </div>
                                <div class="col-4">
                                    <label class="col-sm-7 form-label">User Type</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example" name="librarianType"
                                            required>
                                            <option value="LIBRARIAN" selected>Librarian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="inputPassword5" pattern="[0-9]{11}"
                                        maxlength="11" name="contactNumber" required>
                                </div>

                                <div class="col-6">
                                    <label for="inputAddress5" class="form-label">Street</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="William Shakespeare" name="street" required>
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress5" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="William Shakespeare" name="barangay" required>
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress5" class="form-label">Municipality</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="Book Shelf Inc." name="municipality" required>
                                </div>
                                <div class="col-6">
                                    <label for="inputAddress5" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="Book Shelf Inc." name="province" required>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary ">+ Add Librarian</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->


                        </div>
                    </div>

                </div>


        </section>

    </main><!-- End #main -->




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

</body>

</html>