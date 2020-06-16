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

            if(isset($_GET["delete"]) == true) {
                $prodid = $_GET["delete"];
                $delete="delete from product where prodid=$prodid";
                $conn->query($delete);

                $sql = "SELECT * FROM product LIMIT $page1,5";
                $result = $conn->query($sql);
            }
            else if(isset($_GET["search"]) == true)
            {
                $searching = $_GET["search"];
                $sql="SELECT * FROM product WHERE 
                (prodid like '%$searching%'
                or prodname like '%$searching%'
                or prodcost like '%$searching%'
                or prodprice like'%$searching%'
                or prodtype like '%$searching%'
                or prodquantity like '%$searching%')
                limit $page1, 5";
                $result = $conn->query($sql);
            } 
            else if(isset($_POST["prodname"]) == true && isset($_POST["prodid"]) == false)
            {
                $prodname=$_POST["prodname"];
                $prodcost=$_POST["prodcost"];
                $prodprice=$_POST["prodprice"];
                $prodtype=$_POST["prodtype"];
                $prodquantity=$_POST["prodquantity"];
                $prodid=date("yy").rand(100,999);

                $add = "INSERT INTO product (prodid,prodname,prodcost,prodprice,prodtype,prodquantity)
                VALUES ($prodid,'$prodname','$prodcost','$prodprice','$prodtype','$prodquantity')";
                
                if(mysqli_query($conn,$add))
                {
                    //echo"New record created succesfully";
                    $sql="SELECT * FROM product";
                    //pilih sql mne yg nk run
                    //execute dlm result
                    $result = $conn->query($sql);
                    //cek klu ada value dlm result
                }
                else
                {
                    echo"Error !!" . $sql . "<br>" . mysqli_error($conn);
                }
            } else if(isset($_POST["prodid"]) == true) 
            {
                $prodname=$_POST["prodname"];
                $prodcost=$_POST["prodcost"];
                $prodprice=$_POST["prodprice"];
                $prodtype=$_POST["prodtype"];
                $prodquantity=$_POST["prodquantity"];
                $prodid=$_POST["prodid"];

                $edit="UPDATE product
                        set prodname ='$prodname',
                            prodcost ='$prodcost',
                            prodprice ='$prodprice',
                            prodtype ='$prodtype',
                            prodquantity ='$prodquantity'
                        where prodid ='$prodid'; ";
                $result=$conn->query($edit);
                if($result==true)
                {
                    $sql = "SELECT * from product";
                    $result=$conn->query($sql);  
                }
            }
            else {
                $sql = "SELECT * FROM product LIMIT $page1,5";
                $result = $conn->query($sql);
            }
            
            if($result->num_rows > 0) {
                while($prod = $result->fetch_assoc()) {
                    $val[] = $prod; 
                }
            } else {
                    $val = [];
            }
        ?>
        <!-- Sidenav -->
        <?php include '../../view/navigation.php'; ?>

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
                                        <a href="../../views/product/product.php">
                                            <button type="button" class="btn float-left"> 
                                                View All Products
                                            </button>
                                        </a>
                                        <a href="../../views/product/registerproduct.php">
                                            <button class="btn float-left"> 
                                                Add New Product
                                            </button>
                                        </a>
                                    </div>
                                    <!-- Search form -->
                                    <form action="product.php" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" method="GET">
                                        <div class="form-group mb-0">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                </div>
                                                <input class="form-control" name="search" placeholder="Search" type="text" autocomplete="off">
                                            </div>
                                        </div>
                                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Product ID</th>
                                            <th scope="col" class="sort" data-sort="name">Product Name</th>
                                            <th scope="col" class="sort" data-sort="name">Product Cost</th>
                                            <th scope="col" class="sort" data-sort="name">Product Price</th>
                                            <th scope="col" class="sort" data-sort="name">Product Type</th>
                                            <th scope="col" class="sort" data-sort="name">Product Quantity</th>
                                            <th scope="col" class="sort" data-sort="name">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php foreach($val as $row):?>
                                        <tr>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['prodid']; ?></span>
                                                </div>
                                            </div>
                                            </td>
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
                                                <span class="name mb-0 text-sm"><?php echo $row['prodcost']; ?></span>
                                                </div>
                                            </div>
                                            </td>
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
                                                <span class="name mb-0 text-sm"><?php echo $row['prodtype']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['prodquantity']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="registerproduct.php?edit=<?=$row["prodid"]?>">Edit Product</a>
                                                <a class="dropdown-item" href="product.php?delete=<?=$row["prodid"]?>">
                                                    Delete Product
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
                                                $sql2 = "SELECT count(*) FROM product";
                                            }
                                            $result = $conn->query($sql2);
                                            $pagination = $result->fetch_row();
                                            echo "<script>console.log('" . json_encode($pagination) . "');</script>";
                                            $count = ceil($pagination[0]/5);
                                            for($pageno=1; $pageno<=$count; $pageno++) {
                                        ?>
                                        <li class="page-item <?php if($_GET["page"] == null) $_GET["page"] = 1; if($_GET["page"] == $pageno) echo "active";?>">
                                            <a class="page-link" href="product.php?page=<?=$pageno;?>"><?=$pageno;?></a>
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
