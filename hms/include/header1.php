<?php error_reporting(0);?>
<header>
    <nav class="navbar bg-light header-main">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img id="logo-img" src="assets/images/logo-main.jpeg" alt="main logo" height="50px" width="80px">
                HealthCare
            </a>
            <div class="navbar-nav m1">
                <div class="nav-item dropdown-logo">
                    <i class="fa-solid fa-user-gear fa-2x"></i>

                </div>
                <div class="nav-item ">
                    <a class="nav-link dropdown-toggle btn btn-warning" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        </i> <span class="username">



                            <?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
echo $row['fullName'];
}
            ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="edit-profile.php">My Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                        <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>