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

    <?php include 'headerbar-librarian.php';?>
    <?php include 'sidebar-librarian.php';?>

    <!-- End Sidebar and Header-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>About</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-librarian.php">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">About Library System</h5>
                            <p style="text-align: justify;"> &nbsp &nbsp &nbsp The <b>InFuse Library App</b> is a
                                web-based library
                                application that is used to manage a library's manual
                                functions. The software assists in the management of all library operations, from book
                                records to book distribution. It also allows for the streamlined management of fine book
                                details such as author name, edition, and many other critical details. As a result,
                                searching for books and finding appropriate materials is easier for students and
                                librarians. To track information such as issue date, due date, who has borrowed any
                                material, and so on, electronic management via software is required.

                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Why we developed?</h5>
                            <p style="text-align: justify;"> &nbsp &nbsp &nbsp The system was developed with the
                                intention of assisting NU Baliwag in managing a modern library with accurate data
                                management. This system may assist educational institutions such as schools, colleges,
                                and coaching centers in automating library functions. The primary advantages of an
                                automated library management system are lower overhead and increased productivity. All
                                library functions can be easily maintained by librarians. In a nutshell, this system
                                allows you to keep track of all book transactions in the library.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Business Rules</h5>
                            <p style="text-align: justify;"> &nbsp &nbsp &nbsp The NU Baliwag Library App’s business
                                rules are quite broad, but we attempted to summarize them in order to fit them into our
                                documentation. There are rules in the library that address only library usage, and there
                                are also rules or policies that address borrowing books from the library. <br> <br>
                                <b> Here are some of the rules within the library system:</b>


                                <ol>
                                    <li>Any violation against the following rules and regulations will be punishable per
                                        NU Baliwag.
                                        <ul>
                                            <li>It is a serious offense for a patron to cause a disturbance that causes
                                                damage to or destruction of library property.</li>
                                            <li>Library patrons are not permitted to use the identification of other
                                                patrons to gain access to the library.</li>
                                            <li>Students are expected to always keep the library quiet.</li>
                                            <li>Vandalism (writing on books and other library facilities, defacing
                                                library furniture, mutilating or tearing off pages of books, and
                                                removing security tags), theft, and unauthorized use of any library
                                                material or property not intended for public use are all serious
                                                offenses that will result in disciplinary action.</li>
                                            <li>It is prohibited to eat (including chewing gum), drink, sleep, smoke,
                                                deface library furniture, write on the walls and tables, or engage in
                                                any other form of misbehavior.</li>
                                            <li>Illegal internet activities using library wireless connection are
                                                strictly prohibited (e.g., games, viewing obscene materials, etc.)</li>
                                        </ul>
                                    </li>
                                    <li>Bags and valuables will be kept in a separate location (bag counter).</li>
                                    <li>There will be no seating reservations in the library.</li>
                                </ol>
                            </p>
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