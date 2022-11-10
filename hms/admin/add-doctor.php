<?php
session_start();
error_reporting(0);
include 'include/config.php';
include 'include/checklogin.php';
check_login();

if (isset($_POST['submit'])) {$docspecialization = $_POST['Doctorspecialization'];
    $docname = "Dr.".($_POST['docname']);
    $docaddress = $_POST['clinicaddress'];
    $docfees = $_POST['docfees'];
    $doccontactno = $_POST['doccontact'];
    $docemail = $_POST['docemail'];
    $password = md5($_POST['npass']);
    //getting id and updating patient id
    $sql = mysqli_query($con, "select * from doctors");
    $lastid;
    while ($row = mysqli_fetch_array($sql)) {
        $lastid=$row['id'];
    }
    $lastid+=1;
    $docid="HMSD00".$lastid;
    $sql = mysqli_query($con, "insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password,docid) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password','$docid')");
    if ($sql) {
        echo "<script>alert('Doctor info added Successfully');</script>";
        echo "<script>window.location.href ='manage-doctors.php'</script>";

    }
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
    <?php include('include/header1.php');?>
    <div class="wrapper">
        <?php include('include/sidebar1.php');?>
        <div class="main" style="flex-grow:8">
            <div class="container text-center">

                <!-- start content -->
                <section id="page-title">
                    <div class="row" style="margin-left: 270px;">
                        <div class="col-sm-8">
                            <h1 class="mainTitle fw-bold my-3">Admin | Add Doctor</h1>
                        </div>

                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: BASIC EXAMPLE -->
                <div class="container-fluid  container-fullw bg-white">
                    <div class="row" style="margin-left: 270px;">
                        <div class="col-md-12">

                            <div class="row margin-top-30">
                                <div class="col-lg-8 col-md-12">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">Add Doctor</h5>
                                        </div>
                                        <div class="panel-body">

                                            <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                                                <div class="form-group">
                                                    <label for="DoctorSpecialization">
                                                        Doctor Specialization
                                                    </label>
                                                    <select name="Doctorspecialization" class="form-control"
                                                        required="true">
                                                        <option value="">Select Specialization</option>
                                                        <?php $ret = mysqli_query($con, "select * from doctorspecilization");
while ($row = mysqli_fetch_array($ret)) {
    ?>
                                                        <option
                                                            value="<?php echo htmlentities($row['specilization']); ?>">
                                                            <?php echo htmlentities($row['specilization']); ?>
                                                        </option>
                                                        <?php }?>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="doctorname">
                                                        Doctor Name
                                                    </label>
                                                    <input type="text" name="docname" class="form-control"
                                                        placeholder="Enter Doctor Name" required="true">
                                                </div>


                                                <div class="form-group">
                                                    <label for="address">
                                                        Doctor Clinic Address
                                                    </label>
                                                    <textarea name="clinicaddress" class="form-control"
                                                        placeholder="Enter Doctor Clinic Address"
                                                        required="true"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fess">
                                                        Doctor Consultancy Fees
                                                    </label>
                                                    <input type="text" name="docfees" class="form-control"
                                                        placeholder="Enter Doctor Consultancy Fees" required="true">
                                                </div>

                                                <div class="form-group">
                                                    <label for="fess">
                                                        Doctor Contact no
                                                    </label>
                                                    <input type="text" name="doccontact" class="form-control"
                                                        placeholder="Enter Doctor Contact no" required="true">
                                                </div>

                                                <div class="form-group">
                                                    <label for="fess">
                                                        Doctor Email
                                                    </label>
                                                    <input type="email" id="docemail" name="docemail"
                                                        class="form-control" placeholder="Enter Doctor Email id"
                                                        required="true" onBlur="checkemailAvailability()">
                                                    <span id="email-availability-status"></span>
                                                </div>




                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">
                                                        Password
                                                    </label>
                                                    <input type="password" name="npass" class="form-control"
                                                        placeholder="New Password" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword2">
                                                        Confirm Password
                                                    </label>
                                                    <input type="password" name="cfpass" class="form-control"
                                                        placeholder="Confirm Password" required="required">
                                                </div>



                                                <button type="submit" name="submit" id="submit"
                                                    class="btn btn-o btn-warning">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="panel panel-white">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->

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
    </div>
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
    <!-- <script type="text/javascript">
    var btnContainer = document.getElementById("sidebar");
    var btns = btnContainer.getElementsByClassName("act");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    </script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>


</body>

</html>