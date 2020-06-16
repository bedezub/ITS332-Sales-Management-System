
<?php include '../../config/init.php'; ?>
<!DOCTYPE html>
<html>
    <?php include '../../view/head.php'; ?>
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
                    </div>
                </div>
            </div>
            
            <?php 
                $salesid = $_GET["salesid"];
                $sum = 0;
                $conn = openCon();
                $getProductList = "SELECT *, product_sales.psalesid FROM product_sales, sales, product, customer 
                WHERE sales.salesid = $salesid 
                AND product_sales.salesid = sales.salesid 
                AND (product_sales.psalesid-product_sales.salesid) = product.prodid
                AND customer.custid = sales.custid";
                $result = $conn->query($getProductList);
                if($result->num_rows>0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<script>console.log('. json_encode($row) .')</script>';
                        $val[] = $row;
                        $sum = $sum + ($row["prodprice"] * $row["psalesquantity"]);
                    }
                } else {
                $val = [];
                }
            ?>

            <!-- Light table -->
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col">
                        <div class="card">
                        <div class="card-header bg-transparent border-0" style="display: inline-block;">
                            <div class="text-right">
                                <a href="../../views/home/home.php">
                                <button type="submit" class="btn btn-neutral">
                                    Return
                                </button>
                                </a>
                            </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Name</th>
                                            <th scope="col" class="sort" data-sort="name">Price per Unit (RM)</th>
                                            <th scope="col" class="sort" data-sort="name">Quantity</th>
                                            <th scope="col" class="sort" data-sort="name">Price (RM)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php foreach($val as $row):?>
                                        <tr>
                                            <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['prodname']; ?></span>
                                                </div>
                                            </div>
                                            </th>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['prodprice']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['psalesquantity']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['psalesquantity'] * $row['prodprice']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <div class="text-right">
                                    <h3>Total Price: RM<?=$sum?></h3>
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