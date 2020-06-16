<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in 
* all copies or substantial portions of the Software.
-->
<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php include '../../config/conn.php'; ?>

<!DOCTYPE html>
<html>

<?php include '../../view/head.php'; ?>

<body class="bg-default">
    <?php 
        if(isset($_POST["staffid"])) {
            $conn = OpenCon();
            session_start();
                    
            $staffid = $_POST["staffid"];

            $sql = "SELECT * FROM staff WHERE staffid = $staffid";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['login_user'] = $staffid;
                    header("location: ../../views/home/home.php");
                }
            } else {
                echo "Your Login Name or Password is Invalid";
            }
            CloseCon($conn);
            echo '<script>console.log('. json_encode($row) .')</script>';
        }
    ?>

    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        </div>
            <!-- Page content -->
            <div class="container mt--8 pb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Enter Staff ID</small>
                            </div>
                            <form role="form" method="POST">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" name="staffid" placeholder="Staff ID" type="name">
                                    </div>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Password" type="password">
                                    </div>
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include '../../view/script.html'; ?>
</body>
</html>