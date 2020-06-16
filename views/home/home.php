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
    <body>
        <?php
            $conn = openCon();

            if(isset($_GET["page"]) == true) {
                $page = $_GET["page"];
            } else {
                $page = 0;
            }
            if($page=="" | $page == "1") {
                $page1 = 0;
            } else {
                $page1 = ($page*5)-5;
            }

            $sql = "SELECT * FROM SALES
            JOIN CUSTOMER ON sales.custid = customer.custid
            JOIN STAFF ON sales.staffid = staff.staffid
            JOIN product_sales on sales.psalesid = product_sales.psalesid
            LIMIT $page1, 5";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($prod = $result->fetch_assoc()) {
                    $val[] = $prod;
                }
            } else {
                    $val = [];
            }
        ?>
        <!-- Sidenav -->
        <?php include '../../view/navigation.php';?>

        <!-- Main content -->
        <div class="main-content" id="panel">

        <?php include '../../view/header.php'; ?>
            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                    </div>
                </div>
            </div>

            <!-- Light table -->
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col">
                        <div class="card">
                        <div class="card-header border-0">
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="../../views/home/home.php">
                                            <button type="button" class="btn float-left"> 
                                                View All Sales
                                            </button>
                                        </a>
                                        <a href="../../views/home/registerhome.php">
                                            <button class="btn float-left"> 
                                                Add New Sales
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Sales ID</th>
                                            <th scope="col" class="sort" data-sort="name">Customer Name</th>
                                            <th scope="col" class="sort" data-sort="name">Sales (RM)</th>
                                            <th scope="col" class="sort" data-sort="name">Date</th>
                                            <th scope="col" class="sort" data-sort="name">Staff In-Charge</th>
                                            <th scope="col" class="sort" data-sort="name">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php foreach($val as $row):?>
                                        <tr>
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                    <span class="name mb-0 text-sm"><?php echo $row['salesid']; ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['custname']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['salesquantity']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo date("d-m-Y", strtotime($row['salesdate'])); ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['staffname']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td>
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="../../views/sales/viewsales.php?salesid=<?=$row["salesid"]?>">
                                                    View Sales
                                                </a>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end mb-0">
                                        <?php 
                                            if(isset($_GET["search"]) == true) {

                                                $sql2="SELECT count(*) FROM product WHERE 
                                                (prodid like '%$searching%'
                                                or prodname like '%$searching%'
                                                or prodcost like '%$searching%'
                                                or prodprice like'%$searching%'
                                                or prodtype like '%$searching%'
                                                or prodquantity like '%$searching%')";

                                            } else {
                                                $sql2 = "SELECT count(*) FROM sales";
                                            }
                                            $result = $conn->query($sql2);
                                            $pagination = $result->fetch_row();
                                            echo "<script>console.log('" . json_encode($pagination) . "');</script>";
                                            $count = ceil($pagination[0]/5);
                                            for($pageno=1; $pageno<=$count; $pageno++) {
                                        ?>
                                        <li class="page-item <?php if($_GET["page"] == null) $_GET["page"] = 1; if($_GET["page"] == $pageno) echo "active";?>">
                                            <a class="page-link" href="home.php?page=<?=$pageno;?>"><?=$pageno;?></a>
                                        </li>         
                                        <?php } CloseCon($conn); ?>
                                    </ul>
                                </nav>
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
