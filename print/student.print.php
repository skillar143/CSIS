<?php
session_start();

if (isset($_SESSION['username'])) {

?>
    <!-- header -->
    <title>CSIS</title>
    <!-- Custom fonts for this template-->
    <link rel="icon" href="../assets/img/logo.png">
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/font.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/print.css" rel="stylesheet" media="print">
    <!-- end of header -->
    <div class="p-5">
        <div class="title mb-3 row text-center">
            <div class="col-1 "><img src="../assets/img/logo.jpg" alt=""></div>
        </div>
        <div class="text-right mb-3">
            <a class="btn btn-danger" id="print-btn" href="../admin/studentlist.admin.php"><i class="fas fa-arrow-circle-left"></i></a>
            <button class="btn btn-danger" onclick="window.print();" id="print-btn"><i class="fas fa-print"></i></button>


        </div>

        <table class="table">
            <thead class="bg-primary text-light ">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Cell No.</th>
                    <th>Course</th>
                    <th>Address</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>


                <?php
                include_once '../database/dbconnection.db.php';

                $sql = "SELECT * from studentrecords";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $id = $row['student_id'];
                        $name = $row['name'];
                        $gender = $row['gender'];
                        $cell = $row['cellphone'];
                        $course = $row['course'];
                        $address = $row['address'];


                        $sq = "SELECT * from users where user_id = '$id'";
                        $resul = $conn->query($sq);

                        if ($resul->num_rows > 0) {
                            while ($row = $resul->fetch_assoc()) {



                                echo "<tr><td>" . $id . "</td>
                                    <td>" . $name . "</td>
                                    <td>" . $gender . "</td>
                                    <td>" . $cell . "</td>
                                    <td>" . $course . "</td>
                                    <td>" . $address . "</td>
                                    <td>" . $row['password'] . "</td>
                                    </tr>";
                            }
                        }
                    }
                } else {
                    echo "<tr><td>No records</td></tr>";
                }

                ?>


            </tbody>
        </table>

    </div>


<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>