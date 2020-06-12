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
      $prodid = $_GET["edit"];
      $sql="SELECT * from product where prodid='$prodid'";
      $result=$conn->query($sql);

      if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
    } else {

      $row["prodname"] = "";
      $row["prodcost"] = "";
      $row["prodprice"] = "";
      $row["prodquantity"] = "";
      $row["prodtype"] = " ";
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
                    <small>Edit Product</small>
                  <?php else: ?>
                    <small>Add New Product</small>
                  <?php endif; ?>
              </div>
              <form role="form" action="product.php" method="POST"?>
                <?php if(isset($_GET["edit"])==true): ?>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Product ID" value="<?php echo $row["prodid"]; ?>" name="prodid" type="text" readonly>
                  </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Product Name" value="<?php echo $row["prodname"]; ?>"  name="prodname" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Product Cost" value="<?php echo $row["prodquantity"]; ?>" name="prodcost" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Product Price" value="<?php echo $row["prodprice"]; ?>" name="prodprice" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <input class="form-control" placeholder="Product Quantity" value="<?php echo $row["prodquantity"]; ?>" name="prodquantity" type="text" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group">
                <div class="input-group mb-3">
                    <select name="prodtype" class="custom-select" id="prodtype" required>
                      <option>Product Type</option>
                      <option <?php  if($row["prodtype"] == "Mod"): echo "selected"; endif?> value="Mod">Mod</option>
                      <option <?php  if($row["prodtype"] == "Flavour"): echo "selected"; endif?> value="Flavour">Flavour</option>
                      <option <?php  if($row["prodtype"] == "Others"): echo "selected"; endif?> value="Others">Others</option>
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