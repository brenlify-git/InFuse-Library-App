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
            background-color: #303030;
background-image: linear-gradient(241deg, #303030 0%, #1a266d 100%);

            font-family: 'Poppins', sans-serif;
            color: white;
            font-size: 50px;
        }
        

        .button {
            --width: 190px;
            --timing: 2s;
            border: 0;
            width: var(--width);
            padding-block: 1em;
            color: #fff;
            font-weight: bold;
            font-size: 1em;
            background: rgb(0, 116, 189);
            transition: all 0.2s;
            border-radius: 7px;
            margin: 10px;
        }
        .resetbtn{
            background: rgb(247, 150, 70);
        }

        .button:hover {
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

<script src="https://code.jquery.com/jquery-1.8.2.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#username').keyup(function(){
            $.post("avail-id.php", 
            {username: $('#username').val(),
            
            }, function(response){
                $('#usernameResult').fadeOut();
                setTimeout("Userresult('usernameResult','"+escape(response)+"')",350);
            });
                return false;
        });
    });

    function Userresult(id, response){
        $('#usernameLoading').hide();
        $('#'+id).html(unescape(response));
        $('#'+id).fadeIn();
    }
</script>

</head>

<body>

    <div class="imgheader">
        <div class="headerhey">
            <img src="assets/img/Logo Only.png" style="width:200px">
            Welcome, Nationalians!
            <h4>Register your details here.</h4>
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
                                        title="Format should be like this: 2021-160099" placeholder="2021-160011" id="username" name="username"
                                        required>
                                        <span id="usernameLoading"></span>
                            <span id="usernameResult"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Juan" name="firstName"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middleName" placeholder="Santos" name="middleName"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Dela Cruz" name="lastName"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-7 form-label">Patron Type</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example"
                                            name="patronType" required id="patronType">
                                            <option value="PATRON">Patron</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber" placeholder="09770191818" pattern="09[0-9]{9}"
                                        maxlength="11" name="contactNumber" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-7 form-label">Department</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" aria-label="Default select example"
                                            name="department" id="department" required>
                                            <option disabled value="College of Accountancy, Business and Management">College of Accountancy, Business and Management</option>
                                            <option value="BS Accountancy">BS Accountancy</option>
                                            <option value="BS Accounting Information System">BS Accounting Information System</option>
                                            <option value="BS Business Administration in Financial Management">BS Business Administration in Financial Management</option>
                                            <option value="BS Business Administration in Marketing Management">BS Business Administration in Marketing Management</option>
                                            <option value="BS Hospitality Management">BS Hospitality Management</option>
                                            <option value="BS Tourism Management">BS Tourism Management</option>
                                            <option disabled value="College of Arts and Sciences">College of Arts and Sciences</option>
                                            <option value="BS Psychology">BS Psychology</option>
                                            <option value="Bachelor in Physical Education">Bachelor in Physical Education</option>
                                            <option value="Certificate of Professional Education">Certificate of Professional Education</option>
                                            <option disabled value="College of Engineering and Technology">College of Engineering and Technology</option>
                                            <option value="BS Architecture">BS Architecture</option>
                                            <option value="BS Civil Engineering">BS Civil Engineering</option>
                                            <option value="BS Computer Engineering">BS Computer Engineering</option>
                                            <option value="BS Information Technology">BS Information Technology</option>
                                            <option disabled value="Graduate Studies">Graduate Studies</option>
                                            <option value="Doctors of Education Major in Educational Management">Doctors of Education Major in Educational Management</option>
                                            <option value="Master of Education Major in Educational Management">Master of Education Major in Educational Management</option>
                                            <option value="Master of Education Major in Special Education">Master of Education Major in Special Education</option>
                                            <option value="Master in Management">Master in Management</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Section <i style="color:#0076bd;"> if faculty member use Faculty or N/A</i></label>
                                    <input type="text" class="form-control" id="section" placeholder="ITE201" name="section" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Street</label>
                                    <input type="text" class="form-control" id="street"
                                        placeholder="Adamya" name="street" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="barangay"
                                        placeholder="Caniogan" name="barangay" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Municipality</label>
                                    <input type="text" class="form-control" id="municipality"
                                        placeholder="Baliwag City" name="municipality" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="province"
                                        placeholder="Bulacan" name="province" required>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-secondary button" id="register" value="Register Now!"></input>
                                    <button type="reset" class="resetbtn button">Reset</button>
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