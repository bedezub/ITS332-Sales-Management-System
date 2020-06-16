<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="text-center">
            <img src="../../assets/img/brand/logo.png" style="height:150px; padding-top:25px" alt="...">
        </div>
    <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <!-- Shitty active button. Need to fix with PHP later. -->
            <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/vmog/views/home/home.php") echo "active"; ?>" href="../../views/home/home.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/vmog/views/product/product.php") echo "active"; ?>" href="../../views/product/product.php">
                <i class="ni ni-box-2 text-orange"></i>
                <span class="nav-link-text">Product</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/vmog/views/customer/customer.php") echo "active"; ?>" href="../../views/customer/customer.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Customer</span>
            </a>
            <?php if($login_role == "Manager") {?>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/vmog/views/staff/staff.php") echo "active"; ?>" href="../../views/staff/staff.php">
                <i class="ni ni-circle-08 text-default"></i>
                <span class="nav-link-text">Staff</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/vmog/views/sales/sales.php") echo "active"; ?>" href="../../views/sales/sales.php">
                <i class="ni ni-basket text-info"></i>
                <span class="nav-link-text">Sales</span>
            </a>
            </li>
            <?php } ?>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        </div>
    </div>
    </div>
</nav>