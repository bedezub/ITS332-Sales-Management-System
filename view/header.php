
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                </div>
            </div>
            </li>
        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0">
                    <div class="media align-items-center">
                    <div class="media-body  ml-2  d-none d-lg-block" style="padding-right:30px;">
                        <span class="mb-0 text-sm  font-weight-bold">Welcome! <?php echo $login_name ?> - <?php echo $login_id ?> </span>
                    </div>
                    <a href="../../views/login/logout.php">
                        <button class="btn btn-neutral float-left"> 
                            Log Out
                        </button>
                    </a>
                    </div>
                </a>
            </li>
        </ul>

        </div>
    </div>
    </nav>