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
<?php include '../../config/init.php'; ?>

<!DOCTYPE html>
<html>
    <?php include '../../view/head.php'; ?>
    <?php 
        $conn = OpenCon();

        $totalCust = "SELECT count(*) FROM customer";
        $result = $conn->query($totalCust);
        if($result->num_rows > 0) {
            $countCust = $result->fetch_assoc();
        } 

        $totalSales = "SELECT sum(salesquantity) FROM SALES";
        $result = $conn->query($totalSales);
        if($result->num_rows > 0) {
            $countSales = $result->fetch_assoc();
        } 

        $totalProfit = "SELECT sum(salesprofit) FROM SALES";
        $result = $conn->query($totalProfit);
        if($result->num_rows > 0) {
            $calcProfit = $result->fetch_assoc();
        } 

        $restock = "SELECT * FROM PRODUCT WHERE prodquantity < 30 LIMIT 5";
        $result = $conn->query($restock);
        if($result->num_rows > 0) {
            while($calcStock = $result->fetch_assoc()) {
                $val[] = $calcStock;
            }
        } 

        $topCus = "SELECT * FROM SALES 
        JOIN customer ON sales.custid = customer.custid
        WHERE salesquantity > 1000 
        GROUP BY customer.custname
        LIMIT 5";

        $result = $conn->query($topCus);
        if($result->num_rows > 0) {
            while($bestcus = $result->fetch_assoc()) {
                $cus[] = $bestcus;
            }
        }

        $topProduct = "SELECT product.prodname, SUM(product_sales.psalesquantity) AS top_product 
        FROM product_sales JOIN product ON (product_sales.psalesid - product_sales.salesid) = product.prodid 
        GROUP BY product.prodname order by top_product desc limit 1";
        $result = $conn->query($topProduct);
        if($result->num_rows > 0) {
            $bestProduct = $result->fetch_assoc();
            echo '<script>console.log('. json_encode($bestProduct) .')</script>';
        } 

    ?>
    <body>
        <!-- Sidenav -->
        <?php include '../../view/navigation.php'; ?>
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            <?php include '../../view/header.php'; ?>

            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                    <!-- Card stats -->
                    <div class="row" style="padding-top: 30px;">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Sales</h5>
                                <span class="h2 font-weight-bold mb-0">RM<?php echo $countSales["sum(salesquantity)"];?></span>
                                </div>
                                <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"></span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Profit</h5>
                                <span class="h2 font-weight-bold mb-0">RM<?php echo $calcProfit["sum(salesprofit)"];?></span>
                                </div>
                                <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-active-40"></i>
                                </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"></span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Customer</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo $countCust["count(*)"];?></span>
                                </div>
                                <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-chart-pie-35"></i>
                                </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"></span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Best Selling</h5>
                                <span class="h2 font-weight-bold mb-0"><?php echo $bestProduct["prodname"] ?? ""?></span>
                                </div>
                                <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="ni ni-chart-bar-32"></i>
                                </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"></span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card bg-default">
                                <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                    <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                    <h5 class="h3 text-white mb-0">Need to restock</h5>
                                    </div>
                                </div>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Product ID</th>
                                                    <th scope="col" class="sort" data-sort="name">Product Name</th>
                                                    <th scope="col" class="sort" data-sort="name">Product Type</th>
                                                    <th scope="col" class="sort" data-sort="name">Product Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php foreach($val as $row):?>
                                                <tr>
                                                    <td scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                        <span class="name mb-0 text-white text-sm"><?php echo $row['prodid']; ?></span>
                                                        </div>
                                                    </div>
                                                    </td>
                                                    <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                        <span class="name mb-0 text-white text-sm"><?php echo $row['prodname']; ?></span>
                                                        </div>
                                                    </div>
                                                    </th>
                                                    <td scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                        <span class="name mb-0 text-white text-sm"><?php echo $row['prodtype']; ?></span>
                                                        </div>
                                                    </div>
                                                    </td>
                                                    <td scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                        <span class="name mb-0 text-white text-sm"><?php echo $row['prodquantity']; ?></span>
                                                        </div>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-xl-4">
                            <div class="card">
                                <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Overview</h6>
                                    <h5 class="h3 mb-0">Top Customers</h5>
                                    </div>
                                </div>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="name">Customer Name</th>
                                                    <th scope="col" class="sort" data-sort="name">Customer Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php foreach($cus as $row):?>
                                                <tr>
                                                    <th scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                        <span class="name mb-0 text-sm"><?php echo $row['custname']; ?></span>
                                                        </div>
                                                    </div>
                                                    </th>
                                                    <td scope="row">
                                                    <div class="media align-items-center">
                                                        <div class="media-body">
                                                        <span class="name mb-0 text-sm">0<?php echo $row['custphone']; ?></span>
                                                        </div>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <?php // include 'view/footer.html'; ?> 
        <?php include '../../view/script.html'; ?>
    </body>
</html>