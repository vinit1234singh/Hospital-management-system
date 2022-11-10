<?php
session_start();
error_reporting(0);
include 'include/config.php';
include 'include/checklogin.php';
check_login();

if (isset($_GET['del'])) {
    mysqli_query($con, "delete from doctors where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/styles1.css">

    <title> </title>
</head>

<body>
    <?php include 'include/header1.php';?>
    <div class="wrapper">
        <?php include 'include/sidebar1.php';?>
        <div class="main" style="flex-grow:8">
            <div class="container text-center">

                <div class="main-content">
                    <div class="wrap-content container my-5" id="container">
                        <!-- start: PAGE TITLE -->
                        <section id="page-title">
                            <div class="row" style="margin-left: 270px;">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle fw-bold text-center">Admin | Manage Doctors</h1>
                                </div>

                            </div>
                        </section>
                        <!-- end: PAGE TITLE -->
                        <!-- start: BASIC EXAMPLE -->
                        <div class="container-fluid container-fullw bg-white">


                            <div class="row my-5">
                                <div class="col-md-12">
                                    <h5 class="over-title margin-bottom-15 fw-bold my-3">Manage <span
                                            class="text-bold">Doctors</span></h5>
                                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                        <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                    <table class="table table-hover" id="sample-table-1 my-3">
                                        <thead class="table-dark fw-bold">
                                            <tr>
                                                <th class="center">ID</th>
                                                <th>Specialization</th>
                                                <th class="hidden-xs">Doctor Name</th>
                                                <th>Creation Date </th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$sql = mysqli_query($con, "select * from doctors");
$cnt = 1;
while ($row = mysqli_fetch_array($sql)) {
    ?>

                                            <tr>
                                                <td class="center"><?php echo $row['docid']; ?></td>
                                                <td class="hidden-xs"><?php echo $row['specilization']; ?></td>
                                                <td><?php echo $row['doctorName']; ?></td>
                                                <td><?php echo $row['creationDate']; ?>
                                                </td>

                                                <td>
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <a href="edit-doctor.php?id=<?php echo $row['id']; ?>"
                                                            class="btn btn-transparent btn-xs" tooltip-placement="top"
                                                            tooltip="Edit"><i class="fa fa-pencil"></i></a>

                                                        <a href="manage-doctors.php?id=<?php echo $row['id'] ?>&del=delete"
                                                            onClick="return confirm('Are you sure you want to delete?')"
                                                            class="btn btn-transparent btn-xs tooltips"
                                                            tooltip-placement="top" tooltip="Remove"><i
                                                                class="fa fa-times fa fa-white"></i></a>
                                                    </div>

                                                </td>
                                            </tr>

                                            <?php
$cnt = $cnt + 1;
}?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <section id="footer">
        <div class="emerg-footer">
            <marquee behavior="" direction="left">
                <h6>For Any emergency Contact +91-1234-567-899</h6>
            </marquee>
        </div>
        <div class="cpry-footer" <h6>&copy;IWP Project Team</h6>
        </div>

    </section>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>


</body>

</html>