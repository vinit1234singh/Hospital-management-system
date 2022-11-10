<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	
	$eid=$_GET['editid'];
	$patname=$_POST['patname'];
$patcontact=$_POST['patcontact'];
$patemail=$_POST['patemail'];
$gender=$_POST['gender'];
$pataddress=$_POST['pataddress'];
$patage=$_POST['patage'];
$medhis=$_POST['medhis'];
$sql=mysqli_query($con,"update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
if($sql)
{
echo "<script>alert('Patient info updated Successfully');</script>";
header('location:manage-patient.php');

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

    <title> Doctor</title>
</head>

<body>
    <?php include('include/header1.php');?>
    <div class="wrapper">
        <?php include('include/sidebar1.php');?>
        <div class="main" style="flex-grow:8">
            <div class="container text-center">
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Patient | Add Patient</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Patient</span>
                            </li>
                            <li class="active">
                                <span>Add Patient</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row margin-top-30">
                                <div class="col-lg-8 col-md-12">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">Add Patient</h5>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" name="" method="post">
                                                <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblpatient where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                                <div class="form-group">
                                                    <label for="doctorname">
                                                        Patient Name
                                                    </label>
                                                    <input type="text" name="patname" class="form-control"
                                                        value="<?php  echo $row['PatientName'];?>" required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fess">
                                                        Patient Contact no
                                                    </label>
                                                    <input type="text" name="patcontact" class="form-control"
                                                        value="<?php  echo $row['PatientContno'];?>" required="true"
                                                        maxlength="10" pattern="[0-9]+">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fess">
                                                        Patient Email
                                                    </label>
                                                    <input type="email" id="patemail" name="patemail"
                                                        class="form-control" value="<?php  echo $row['PatientEmail'];?>"
                                                        readonly='true'>
                                                    <span id="email-availability-status"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Gender: </label>
                                                    <?php  if($row['Gender']=="Female"){ ?>
                                                    <input type="radio" name="gender" id="gender" value="Female"
                                                        checked="true">Female
                                                    <input type="radio" name="gender" id="gender" value="male">Male
                                                    <?php } else { ?>
                                                    <label>
                                                        <input type="radio" name="gender" id="gender" value="Male"
                                                            checked="true">Male
                                                        <input type="radio" name="gender" id="gender"
                                                            value="Female">Female
                                                    </label>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">
                                                        Patient Address
                                                    </label>
                                                    <textarea name="pataddress" class="form-control"
                                                        required="true"><?php  echo $row['PatientAdd'];?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fess">
                                                        Patient Age
                                                    </label>
                                                    <input type="text" name="patage" class="form-control"
                                                        value="<?php  echo $row['PatientAge'];?>" required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fess">
                                                        Medical History
                                                    </label>
                                                    <textarea type="text" name="medhis" class="form-control"
                                                        placeholder="Enter Patient Medical History(if any)"
                                                        required="true"><?php  echo $row['PatientMedhis'];?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fess">
                                                        Creation Date
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        value="<?php  echo $row['CreationDate'];?>" readonly='true'>
                                                </div>
                                                <?php } ?>
                                                <button type="submit" name="submit" id="submit"
                                                    class="btn btn-o btn-warning">
                                                    Update
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