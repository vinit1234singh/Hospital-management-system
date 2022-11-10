<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
		  {
mysqli_query($con,"update appointment set doctorStatus='0' where id ='".$_GET['id']."'");
                  $_SESSION['msg']="Appointment canceled !!";
		  }

if(isset($_GET['done']))
		  {
mysqli_query($con,"update appointment set doctorStatus='2' where id ='".$_GET['id']."'");
                  $_SESSION['msg']="Appointment completed !!";
                  $patid="HMSP00".$_GET['id'];
                  header('Location: http://localhost/iwp/hms/doctor/search.php');
		  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Appointment History</title>


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
</head>

<body>

    <?php include('include/header1.php');?>
    <div class="wrapper">
        <?php include('include/sidebar1.php');?>
        <!-- end: TOP NAVBAR -->
        <div class="main" style="flex-grow:8">
            <div class="container text-center">
                <!-- content start -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle my-5 fw-bold">Doctor | Appointment History</h1>
                        </div>

                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: BASIC EXAMPLE -->
                <div class="container-fluid container-fullw bg-white">


                    <div class="row">
                        <div class="col-md-12">

                            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg']="");?></p>
                            <table class="table table-hover" id="sample-table-1">
                                <thead>
                                    <tr>
                                        <th class="center">Sr.No</th>
                                        <th class="hidden-xs">User Name</th>
                                        <th>Appointment ID</th>
                                        <!-- <th>Specialization</th> -->
                                        <th>Consultancy Fee</th>
                                        <th>Appointment Date / Time </th>
                                        <th>Appointment Creation Date </th>
                                        <th>Current Status</th>
                                        <th colspan="2">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$sql=mysqli_query($con,"select users.fullName as fname,appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                                    <tr>
                                        <td class="center"><?php echo $cnt;?>.</td>
                                        <td class="hidden-xs"><?php echo $row['fname'];?></td>
                                        <td><?php echo $row['appid'];?></td>

                                        <td><?php echo $row['consultancyFees'];?></td>
                                        <td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
                                        </td>
                                        <td><?php echo $row['postingDate'];?></td>
                                        <td>
                                            <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{
	echo "Active";
}
if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
{
	echo "Cancelled by Patient";
}

if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
{
	echo "Cancelled by you";
}
if(($row['doctorStatus']==2))  
{
	echo "Completed";
}



												?></td>
                                        <td colspan="2">
                                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                                                { ?>


                                                <a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update"
                                                    onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                                                    class="btn btn-transparent btn-xs tooltips"
                                                    title="Cancel Appointment" tooltip-placement="top"
                                                    tooltip="Remove">Cancel</a>
                                                <?php } else {
                                                              if(($row['doctorStatus']!=2)) 
		                                                     echo "Cancelled";
		                                                     } ?>
                                            </div>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                                                { ?>


                                                <a href="appointment-history.php?id=<?php echo $row['id']?>&done=update"
                                                    class="btn btn-transparent btn-xs tooltips"
                                                    title="Complete Appointment" tooltip-placement="top" tooltip="">|
                                                    Complete</a>
                                                <?php } else {
                                                             if(($row['doctorStatus']==2)) 
		                                                     echo "Completed";
		                                                     } ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php 
$cnt=$cnt+1;
											 }?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- end: BASIC EXAMPLE -->
                <!-- end: SELECT BOXES -->

            </div>
        </div>
    </div>
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
    jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
    });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>