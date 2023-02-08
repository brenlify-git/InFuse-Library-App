<?PHP

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>InFuse | Patron Membership</title>
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
    <style>
        .headerhey {
            padding: 30px;
            text-align: center;
            background-image: linear-gradient(to right, rgba(0, 116, 189), rgba(37, 50, 116));
            color: white;
            font-size: 30px;
        }
        

        button {
            --width: 150px;
            --timing: 2s;
            border: 0;
            width: var(--width);
            padding-block: 1em;
            color: #fff;
            font-weight: bold;
            font-size: 1em;
            background: rgb(0, 116, 189);
            transition: all 0.2s;
            border-radius: 3px;
            margin: 10px;
        }

        button:hover {
            background-image: linear-gradient(to right, rgb(250, 82, 82), rgb(250, 82, 82) 16.65%, rgb(190, 75, 219) 16.65%, rgb(190, 75, 219) 33.3%, rgb(76, 110, 245) 33.3%, rgb(76, 110, 245) 49.95%, rgb(64, 192, 87) 49.95%, rgb(64, 192, 87) 66.6%, rgb(250, 176, 5) 66.6%, rgb(250, 176, 5) 83.25%, rgb(253, 126, 20) 83.25%, rgb(253, 126, 20) 100%, rgb(250, 82, 82) 100%);
            animation: var(--timing) linear dance6123 infinite;
            transform: scale(1.1) translateY(-1px);
        }

        @keyframes dance6123 {
            to {
                background-position: var(--width);
            }
        }
    </style>

</head>

<body>

    <div class="imgheader">
        <div class="headerhey">
            <h1>Welcome, Nationalians!</h1>
        </div>
    </div>


    <div class="m-5">

        <div class="pagetitle">
            <h1>Patron Registration</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Welcome</a></li>
                    <li class="breadcrumb-item active">Sign Up</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Insert your Information</h5>



                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="add-patrons.php" method="post">

                                <div class="col-md-12">
                                    <label for="inputEmail5" class="form-label">Student ID</label>
                                    <input type="text" class="form-control" pattern="[0-9]{4}-[0-9]{6}" maxlength="11"
                                        title="Format should be like this: 2021-160099" id="inputEmail5" name="studID"
                                        required>
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
                                <div class="col-md-6">
                                    <label class="col-sm-7 form-label">Patron Type</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example"
                                            name="patronType" required>
                                            <option value="PATRON">Patron</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="inputPassword5" pattern="[0-9]{11}"
                                        maxlength="11" name="contactNumber" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-7 form-label">Department</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example"
                                            name="department" required>
                                            <option value="BSIT">BSIT</option>
                                            <option value="BSPSYCH">BSPSYCH</option>
                                            <option value="BSBA">BSBA</option>
                                            <option value="BSCE">BSCE</option>
                                            <option value="BSHM">BSHM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Section</label>
                                    <input type="text" class="form-control" id="inputPassword5" name="section" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Street</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="William Shakespeare" name="street" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="William Shakespeare" name="barangay" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Municipality</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="Book Shelf Inc." name="municipality" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="inputAddres5s"
                                        placeholder="Book Shelf Inc." name="province" required>
                                </div>


                                <div class="text-center">
                                    <button type="submit">+ Join Now!</button>
                                    <button type="reset">Reset</button>
                                </div>
                            </form><!-- End Multi Columns Form -->


                        </div>
                    </div>

                </div>


        </section>

    </div><!-- End #main -->





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