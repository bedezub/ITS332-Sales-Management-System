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

      // Untuk set register product
      $cust = null;
      $psales = null;

      if(isset($_GET["calledit"])) {

        $custid = $_GET["custid"];
        $salesid = $_GET["salesid"];
        $prodid = $_GET["prodid"];
        $psalesid = $_GET["psalesid"];

        $checkPsales="SELECT * FROM product_sales WHERE psalesid=$psalesid";
        $result = $conn->query($checkPsales);
        if($result->num_rows > 0) {
          $psales = $result->fetch_assoc();
        }   
        
        $checkCust = "SELECT * FROM CUSTOMER WHERE custname LIKE '%$custid%' or custid like '%$custid%'";
        $result = $conn->query($checkCust);
        if($result->num_rows>0) { 
          $cust = $result->fetch_assoc();
        } 

        $checkProd = "SELECT * FROM PRODUCT WHERE prodid LIKE '%$prodid%'";
        $result = $conn->query($checkProd);
        if($result->num_rows>0) { 
          $prod = $result->fetch_assoc();
        } 

        $checkSales="SELECT * FROM SALES WHERE salesid=$salesid";
        $result = $conn->query($checkSales);
        if($result->num_rows>0) { 
          $sales = $result->fetch_assoc();
        }    

        if(isset($_GET['calledit'])){unset($_GET['calledit']);} 

      } else if(isset($_GET["calldelete"])) {

        $custid = $_GET["custid"];
        $salesid = $_GET["salesid"];
        $prodid = $_GET["prodid"];
        $psalesid = $_GET["psalesid"];

        $delete="delete from product_sales where psalesid=$psalesid";
        $conn->query($delete);

        $checkPsales="SELECT * FROM product_sales WHERE psalesid=$psalesid";
        $result = $conn->query($checkPsales);
        if($result->num_rows > 0) {
          $psales = $result->fetch_assoc();
        }   
        
        $checkCust = "SELECT * FROM CUSTOMER WHERE custname LIKE '%$custid%' or custid like '%$custid%'";
        $result = $conn->query($checkCust);
        if($result->num_rows>0) { 
          $cust = $result->fetch_assoc();
        } 

        $checkProd = "SELECT * FROM PRODUCT WHERE prodid LIKE '%$prodid%'";
        $result = $conn->query($checkProd);
        if($result->num_rows>0) { 
          $prod = $result->fetch_assoc();
        } 

        $checkSales="SELECT * FROM SALES WHERE salesid=$salesid";
        $result = $conn->query($checkSales);
        if($result->num_rows>0) { 
          $sales = $result->fetch_assoc();
        }    

        if(isset($_GET['calldelete'])){unset($_GET['calldelete']);} 

      } else if(isset($_POST["custid"]) && isset($_POST["prodid"])) {
        echo '<script>console.log('. json_encode("Masuk 2") .')</script>';
        $custid = $_POST["custid"];
        $salesid = $_POST["salesid"];
        $prodid = $_POST["prodid"];
        $psalesquantity = $_POST["psalesquantity"];
        
        $checkCust = "SELECT * FROM CUSTOMER WHERE custname LIKE '%$custid%'";
        $result = $conn->query($checkCust);
        if($result->num_rows>0) { 
          $cust = $result->fetch_assoc();
        } 

        $checkProd = "SELECT * FROM PRODUCT WHERE prodid LIKE '%$prodid%'";
        $result = $conn->query($checkProd);
        if($result->num_rows>0) { 
          $prod = $result->fetch_assoc();
        } 

        $sql="SELECT * FROM SALES WHERE salesid=$salesid";
        $result = $conn->query($sql);
        if($result->num_rows>0) { 
          $sales = $result->fetch_assoc();
        } 

        $psalesid = $prod["prodid"] + $salesid;
        $createPSales = "INSERT INTO product_sales (psalesid, salesid, psalesquantity) 
        VALUES ($psalesid, '$salesid', $psalesquantity);";

        if(mysqli_query($conn,$createPSales))
        {
            $sql="SELECT * FROM product_sales WHERE psalesid=$psalesid";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
              $psales = $result->fetch_assoc();
            }
        }
        
      } else if(isset($_POST["custid"])) {
        echo '<script>console.log('. json_encode("Masuk 1") .')</script>';
        $custid = $_POST["custid"];
        $sql = "SELECT * FROM CUSTOMER WHERE custid=$custid";
        $result = $conn->query($sql);
        if($result->num_rows>0) { 
          $cust = $result->fetch_assoc();

          $salesid = date("yy").rand(100000,999999);
          $staffid = 2020198436;
          $date=date("Y-m-d");
          $createSales = "INSERT INTO SALES (salesid, custid, staffid, psalesid, salesquantity, salesdate, salesprofit) 
          VALUES ($salesid, $custid, $staffid, 0, 0, '$date', 1);";

          if(mysqli_query($conn,$createSales))
          {
              $sql="SELECT * FROM SALES WHERE salesid=$salesid";
              $result = $conn->query($sql);
              $sales = $result->fetch_assoc();
          }
      } else {
        echo '<script>console.log('. json_encode("Masuk sini") .')</script>';
      }
    }
    ?>
  <!-- Navbar -->
  <?php //include '../../view/navigation.php'; ?>
  <!-- Main content -->
  <div class="main-content">
    <?php //include '../../view/header.html'; ?>
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
                    <small>Enter New Sales</small>
              </div>
              <?php if(isset($_GET["calledit"])) {?>
              <!-- Update -->
                <form role="form" action="registerhome.php" method="POST">
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <input class="form-control" placeholder="Customer ID" value="<?php echo $cust["custname"] ?? ""; ?>" name="custid" type="text" autocomplete="off" required>
                      <input type="" id="sales" name="salesid" value="<?php echo $sales["salesid"] ?? ""; ?>">
                    </div>
                  </div>
                  <?php if(isset($_POST["custid"]) || isset($_GET["custid"])) {?>
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative mb-3">
                        <input class="form-control" placeholder="Product ID" name="prodid" type="text" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative mb-3">
                        <input class="form-control" placeholder="Product Quantity" name="psalesquantity" type="text" autocomplete="off" required>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">
                      Add Product
                    </button>
                  </div>
                </form>
                <?php } else { ?>
                <!-- Register -->
                <form role="form" action="registerhome.php" method="POST">
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <input class="form-control" placeholder="Customer ID" value="<?php echo $cust["custname"] ?? ""; ?>" name="custid" type="text" autocomplete="off" required>
                      <input type="" id="sales" name="salesid" value="<?php echo $sales["salesid"] ?? ""; ?>">
                    </div>
                  </div>
                  <?php if(isset($_POST["custid"]) || isset($_GET["custid"])) {?>
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative mb-3">
                        <input class="form-control" placeholder="Product ID" name="prodid" type="text" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative mb-3">
                        <input class="form-control" placeholder="Product Quantity" name="psalesquantity" type="text" autocomplete="off" required>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">
                      Add Product
                    </button>
                  </div>
                </form>
                <?php } ?>
            </div>
          </div>
          <?php 
            if(isset($_POST["prodid"]) || isset($_GET["prodid"])) { 

            $getProductList = "SELECT *, product_sales.psalesid FROM product_sales, sales, product, customer 
            WHERE sales.salesid = $salesid 
            AND product_sales.salesid = sales.salesid 
            AND (product_sales.psalesid-product_sales.salesid) - product.prodid
            AND customer.custid = sales.custid";
            $result = $conn->query($getProductList);
            if($result->num_rows>0) {
              while($row = $result->fetch_assoc()) {
                $val[] = $row;
              }
            } else {
              $val = [];
            }
            if(sizeof($val) != 0) {
          ?>  
          <div class="card bg-default shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Price</th>
                    <th scope="col" class="sort" data-sort="status">Quantity</th>
                    <th scope="col" class="sort" data-sort="status">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php 
                    }
                    foreach($val as $row):
                  ?>
                  <tr>
                    <td>
                      <?= $row["prodname"] ?>
                    </td>
                    <td>
                      <?= $row["prodprice"] ?>
                      
                    </td>
                    <td>
                      <?= $row["psalesquantity"] ?>
                    </td>
                    <td>
                      <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="registerhome.php?calledit=<?php echo "edit";?>&custid=<?=$row["custid"]?>&prodid=<?=$row["prodid"]?>&salesid=<?=$row["salesid"]?>&psalesid=<?=$row["psalesid"]?>">
                            Edit Product
                          </a>
                          <a class="dropdown-item" href="registerhome.php?calldelete=<?="delete";?>&custid=<?=$row["custid"]?>&prodid=<?=$row["prodid"]?>&salesid=<?=$row["salesid"]?>&psalesid=<?=$row["psalesid"]?>">
                            Delete Product
                          </a>
                          </div>
                      </div>
                    </td>
                  </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php } ?>
        </div>

          <!-- <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Indicates a successful or positive action.
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <?php closeCon($conn); include '../../view/script.html'; ?>
</body>
</html>