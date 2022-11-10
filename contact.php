<?php
include_once 'hms/include/config.php';
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $mobileno = $_POST['mobileno'];
    $dscrption = $_POST['description'];
    $query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
    echo "<script>alert('Your information succesfully submitted');</script>";
    echo "<script>window.location.href ='contact.php'</script>";

}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>HMS | Contact us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap%27" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

body {
    background: #F8FBFB;
    font-family: 'Montserrat', sans-serif;
    background-image: url(images/hms_image_2.jpg);
}

.wrap {
    padding: 20px;
}

.header {
    background: url(../images/header-bg.png);
}

.section {
    clear: both;
    padding: 0px 100px;
    margin: 0px 100px;
}

.group:before,
.group:after {
    content: "";
    display: table;
}

.group:after {
    clear: both;
}

.group {
    zoom: 1;
}

.col {
    display: block;
    float: left;
}

.col:first-child {
    margin-left: 0;
}

.span_2_of_3 {
    width: 67.1%;
    padding: 1.5% 1.5% 1.5% 1.5%;
    border: 4px solid #ffc107;
    border-radius: 5px;
    margin-bottom: 10px;
}

.span_1_of_3 {
    padding: 0px 10px;
    margin-right: 30px;
    background-color: #ffc107;
    box-shadow: 5px 10px 10px grey;
}

.span_2_of_3 h2,
.span_1_of_3 h2 {
    color: black;
    margin-top: 0;
    font-size: 1.5em;
    font-weight: normal;
    letter-spacing: -1px;
    margin-top: 12px;
    padding-bottom: 20px;
}

.contact-form {
    position: relative;
    padding-bottom: 10px;
}

.contact-form div {
    padding: 5px 0 0px 0;
}

.contact-form span {
    display: block;
    font-size: 1em;
    color: black;
}

.contact-form input[type="text"],
input[type="email"],
.contact-form textarea {
    padding: 8px;
    display: block;
    width: 98%;
    background: #fcfcfc;
    border: none;
    outline: none;
    color: black;
    font-size: 0.8125em;
    box-shadow: inset 0px 0px 3px rgb(199, 199, 199);
    -webkit-box-shadow: inset 0px 0px 3px rgb(199, 199, 199);
    -moz-box-shadow: inset 0px 0px 3px rgb(199, 199, 199);
    -o-box-shadow: inset 0px 0px 3px rgb(199, 199, 199);
    -webkit-appearance: none;
}

.contact-form textarea {
    resize: none;
    height: 120px;
}

.submit-button {
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-form input[type="submit"] {
    font-size: 1em;
    background: #ffc107;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3285d1', endColorstr='#3285d1', GradientType=0);
    border: #fff 1px solid;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0px 0px 3px rgb(207, 206, 206);
    -moz-box-shadow: 0px 0px 3px rgb(207, 206, 206);
    box-shadow: 0px 0px 3px rgb(207, 206, 206);
    text-transform: uppercase;
    color: #fff;
    padding: 15px 20px;
    transition: 0.5s ease;
    -o-transition: 0.5s ease;
    -webkit-transition: 0.5s ease;
    float: left;
    margin-top: 8px;
    cursor: pointer;
}

.contact-form input[type="submit"]:hover {
    color: #000;
}

.contact-form input[type="submit"]:active {
    background-color: #000;
}

.company_address {
    padding: 30 !important;
}

.company_address p {
    font-size: 0.9em;
    color: black;
    line-height: 0.5em;
}

.company_address p span {
    text-decoration: underline;
    color: #333;
    cursor: pointer;
    font-size: 1em;
}

.map {
    border: 1px solid #C7C7C7;
    margin-bottom: 15px;
}

.footer {
    background: #e0e7eb;
    padding: 15px 4px;
}

.footer-left {
    float: left;
}

.footer-left ul li {
    display: inline-block;
}

.footer-left ul li a {
    color: black;
    text-transform: uppercase;
    display: block;
    margin-right: 10px;
}

.footer-right {
    float: right;
}

.footer-right p {
    color: black;
    text-transform: uppercase;
}

.footer-right a {
    text-transform: uppercase;
    color: black;
}

.footer-right a:hover,
.footer-left ul li a:hover {
    color: #3391E7;
}

.about h4,
.services h4 {
    color: black;
    margin-top: 0;
    font-size: 2em;
    font-weight: normal;
    letter-spacing: -1px;
    margin-top: 12px;
}

.footer {
    width: 100%;
    margin-bottom: 0%;
    font-family: 'Montserrat', sans-serif;
    position: absolute;
    bottom: 0;
}

.emerg-footer {
    height: 20px;
    background-color: rgb(242, 41, 41);
    text-align: center;
    color: white;
}

.cpry-footer {
    text-align: center;
    background-color: whitesmoke;
}
</style>

<body>

    <nav class="navbar navbar-expand-lg bg-light py-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo-main.jpeg" alt="" height="65px">
                HealthCare
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            SignIn
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="hms/user-login.php">Patient</a></li>
                            <li><a class="dropdown-item" href="hms/doctor/">Doctor</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="hms/admin">Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning" href="hms/registration.php">Sign Up</a>
                    </li>
            </div>
        </div>
    </nav>

    <div class="wrap">
        <div class="contact">
            <div class="section group">
                <div class="col span_1_of_3">

                    <div class="company_address">
                        <h2>Hospital Address :</h2>
                        <p>VIT Vellore</p>
                        <p>Velore,Tamilnadu</p>
                        <p>India</p>
                        <p>Email: <span>info@vithospitals.com</span></p>

                    </div> <!-- company_address-->
                </div>
                <!--colspan 1 of 3-->

                <div class="col span_2_of_3">
                    <div class="contact-form">
                        <h2>Contact Us</h2>
                        <form name="contactus" method="post">
                            <div>
                                <span><label>NAME</label></span>
                                <span><input type="text" name="fullname" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>E-MAIL</label></span>
                                <span><input type="email" name="emailid" required="ture" value=""></span>
                            </div>
                            <div>
                                <span><label>MOBILE.NO</label></span>
                                <span><input type="text" name="mobileno" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>Description</label></span>
                                <span><textarea name="description" required="true"> </textarea></span>
                            </div>
                            <div class="submit-button">
                                <span><input type="submit" name="submit" value="Submit"></span>
                            </div>
                        </form>
                    </div>
                    <!--contact form-->
                </div>
                <!--colspan 2 of 3-->
            </div> <!--  section group  -->
        </div>
        <!--contact-->
    </div>
    <!--wrap-->

    <section id="footer">
        <div class="emerg-footer">
            <marquee behavior="" direction="left">
                <h6>For Any emergency Contact +91-1234-567-899</h6>
            </marquee>
        </div>
        <div class="cpry-footer" <h6>&copy;IWP Project Team</h6>
        </div>
    </section>
</body>

</html>