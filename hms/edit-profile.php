<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your Profile updated Successfully";


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

    <title>Edit patient</title>
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
                            <h1 class="mainTitle">User | Edit Profile</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>User </span>
                            </li>
                            <li class="active">
                                <span>Edit Profile</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: BASIC EXAMPLE -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 style="color: green; font-size:18px; ">
                                <?php if($msg) { echo htmlentities($msg);}?> </h5>
                            <div class="row margin-top-30">
                                <div class="col-lg-8 col-md-12">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">Edit Profile</h5>
                                        </div>
                                        <div class="panel-body">
                                            <?php 
$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>
                                            <h4><?php echo htmlentities($data['fullName']);?>'s Profile</h4>
                                            <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?>
                                            </p>
                                            <?php if($data['updationDate']){?>
                                            <p><b>Profile Last Updation Date:
                                                </b><?php echo htmlentities($data['updationDate']);?></p>
                                            <?php } ?>
                                            <hr />
                                            <form role="form" name="edit" method="post">


                                                <div class="form-group">
                                                    <label for="fname">
                                                        User Name
                                                    </label>
                                                    <input type="text" name="fname" class="form-control"
                                                        value="<?php echo htmlentities($data['fullName']);?>">
                                                </div>


                                                <div class="form-group">
                                                    <label for="address">
                                                        Address
                                                    </label>
                                                    <textarea name="address"
                                                        class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="city">
                                                        City
                                                    </label>
                                                    <input type="text" name="city" class="form-control"
                                                        required="required"
                                                        value="<?php echo htmlentities($data['city']);?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="gender">
                                                        Gender
                                                    </label>

                                                    <select name="gender" class="form-control" required="required">
                                                        <option value="<?php echo htmlentities($data['gender']);?>">
                                                            <?php echo htmlentities($data['gender']);?></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>

                                                </div>

                                                <div class="form-group">
                                                    <label for="fess">
                                                        User Email
                                                    </label>
                                                    <input type="email" name="uemail" class="form-control"
                                                        readonly="readonly"
                                                        value="<?php echo htmlentities($data['email']);?>">
                                                    <a href="change-emaild.php">Update your email id</a>
                                                </div>







                                                <button type="submit" name="submit" class="btn btn-o btn-warning">
                                                    Update
                                                </button>
                                            </form>
                                            <?php } ?>
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

        <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
        </script>


</body>

</html>