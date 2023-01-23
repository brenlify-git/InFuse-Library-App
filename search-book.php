
<?php

include 'connection.php';

$search = $_POST['search'];

$stmt = $conn->prepare("SELECT * FROM tbl_bookinfo WHERE Book_Name LIKE ? ORDER BY Book_Name ASC");
$search = "%" . $search . "%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    while($tbl_bookinfo = $result->fetch_assoc()){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>InFuse | About</title>
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

    <?php include 'headerbar-student.php';?>
    <?php include 'sidebar-student.php';?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>About</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-student.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="catalogue.php">Book Catalogue</a></li>
                    <li class="breadcrumb-item active">Search Result: <?= $search = $_POST['search']; ?> </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        
        
        <div class="col-md-4 mb-4 search-bar">
            <form class="search-form d-flex align-items-center" method="post" action="search-book.php">
                <label for="inputPassword5" class="form-label"></label>
                <input type="text" class="form-control" name="search" placeholder="Search" title="Enter search keyword" value="<?= $search = $_POST['search']; ?>" required>
                <button class="btn"><i class="bi bi-search p-1"  type="submit" title="Search" name="btns"></i></button>
            </form>
        </div>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="float-right">
                                <img src="assets/img/logo.png" alt="" style="width: 250px; float:right;">
                                </div>
                                <h5 class="card-title"><?= $tbl_bookinfo['Book_Name'];?></h5>
                                <h5 class="card-text">Call No: <?= $tbl_bookinfo['Call_No'];?></h5>
                                <h5 class="card-text">Book Author(s): <?= $tbl_bookinfo['Book_Author'];?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main><!-- End #main -->
     <!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="text-center">
        Developed by: InFuse Technologies
    </div>
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

</body>

</html>

        <?php
    }
}
else{
    echo '<script type = "text/javascript">';
    echo 'alert("Book not found, find another");';
    echo 'window.location.href = "catalogue.php"';
    echo '</script>';
}

?>
