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
      $staffid = $_GET["edit"];
      $sql="SELECT * from staff where staffid='$staffid'";
      $result=$conn->query($sql);

      if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
    } else {

      $row["staffname"] = "";
      $row["staffphone"] = "";
      $row["staffadd"] = "";
      $row["staffsalary"] = "";
      $row["staffrole"] = " ";
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
                    <small>Edit Staff</small>
                  <?php else: ?>
                    <small>Add New Staff</small>
                  <?php endif; ?>
              </div>
              <form role="form" action="staff.php" method="POST"?>
                <?php if(isset($_GET["edit"])==true): ?>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Staff ID" value="<?php echo $row["staffid"]; ?>" name="staffid" type="text" readonly>
                  </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Staff Name" value="<?php echo $row["staffname"]; ?>"  name="staffname" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Staff Phone" value="<?php echo $row["staffphone"]; ?>" name="staffphone" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Staff Address" value="<?php echo $row["staffadd"]; ?>" name="staffadd" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Staff Salary" value="<?php echo $row["staffsalary"]; ?>" name="staffsalary" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                <div class="input-group mb-3">
                    <select name="staffrole" class="custom-select" id="staffrole" required>
                      <option>Staff Role</option>
                      <option <?php  if($row["staffrole"] == "Manager"): echo "selected"; endif?> value="Manager">Manager</option>
                      <option <?php  if($row["staffrole"] == "Cashier"): echo "selected"; endif?> value="Cashier">Cashier</option>
                      <option <?php  if($row["staffrole"] == "Sales"): echo "selected"; endif?> value="Sales">Sales</option>
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