<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall 
* be included in all copies or substantial portions of the Software.
-->
<?php include '../../config/conn.php'; ?>

<!DOCTYPE html>
<html>

<?php include '../../view/head.html'; ?>

<body class="bg-default">
  <?php 
    $conn = openCon();
    if(isset($_GET["edit"]) == true) {
      $custid = $_GET["edit"];
      $sql="SELECT * from CUSTOMER where custid='$custid'";
      $result=$conn->query($sql);

      if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
    } else {
      $row["custname"] = "";
      $row["custphone"] = "";
      $row["custadd"] = "";
      $row["custid"] = "";
    }
  ?>
  <!-- Navbar -->
  <?php include '../../view/navigation.php'; ?>
  <!-- Main content -->
  <div class="main-content">
    <?php include '../../view/header.html'; ?>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">

      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                  <?php if(isset($_GET["edit"])==true): ?>
                    <small>Edit Customer</small>
                  <?php else: ?>
                    <small>Add New Customer</small>
                  <?php endif; ?>
              </div>
              <form role="form" action="customer.php" method="POST"?>
                <?php if(isset($_GET["edit"])==true): ?>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Customer ID" value="<?php echo $row["custid"]; ?>" name="custid" type="text" readonly>
                  </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Customer Name" value="<?php echo $row["custname"]; ?>"  name="custname" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Customer Phone" value="<?php echo $row["custphone"]; ?>"  name="custphone" type="text" autocomplete="off"required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Customer Address" value="<?php echo $row["custadd"]; ?>" name="custadd" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                <div class="input-group mb-3">
                    <select name="custmem" class="custom-select" id="prodtype" required>
                      <option>Customer Membership</option>
                      <option <?php if(substr($row["custid"], 0, 1) == 1) echo "selected"; ?> value="1">Member</option>
                      <option <?php if(substr($row["custid"], 0, 1) == 2) echo "selected"; ?>value="2">Non-member</option>
                    </select>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success mt-4">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <?php closeCon($conn); include '../../view/script.html'; ?>
</body>

</html>