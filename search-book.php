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
        <!-- ======= Sidebar and Header ======= -->

    <?php include 'headerbar-student.php';?>
    <?php include 'sidebar-student.php';?>

    <!-- End Sidebar and Header-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>About</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-student.php">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

       

     

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

        <?php
    }
}
else{
    echo "No Results found";
}

?>
