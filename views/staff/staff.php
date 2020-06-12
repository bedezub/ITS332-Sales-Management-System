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
<?php include '../../config/conn.php'; ?>

<!DOCTYPE html>
<html>
    <?php include '../../view/head.html'; ?>
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
                $sql="SELECT * FROM STAFF WHERE 
                (staffid like '%$searching%'
                or staffname like '%$searching%'
                or staffphone like '%$searching%'
                or staffadd like'%$searching%'
                or staffsalary like '%$searching%'
                or staffrole like '%$searching%')
                limit $page1, 5";
                $result = $conn->query($sql);
            } 
            else if(isset($_POST["staffname"]) == true && isset($_POST["staffid"]) == false)
            {
                $staffname=$_POST["staffname"];
                $staffphone=$_POST["staffphone"];
                $staffadd=$_POST["staffadd"];
                $staffsalary=$_POST["staffsalary"];
                $staffrole=$_POST["staffrole"];
                $staffid=date("yy").rand(100,999);

                $add = "INSERT INTO staff (staffid,staffname,staffphone,staffadd,staffsalary,staffrole)
                VALUES ($staffid,'$staffname','$staffphone','$staffadd','$staffsalary','$staffrole')";
                
                if(mysqli_query($conn,$add))
                {
                    //echo"New record created succesfully";
                    $sql="SELECT * FROM STAFF";
                    //pilih sql mne yg nk run
                    //execute dlm result
                    $result = $conn->query($sql);
                    //cek klu ada value dlm result
                }
                else
                {
                    echo"Error !!" . $sql . "<br>" . mysqli_error($conn);
                }
            } else if(isset($_POST["staffid"]) == true) 
            {
                $staffname=$_POST["staffname"];
                $staffphone=$_POST["staffphone"];
                $staffadd=$_POST["staffadd"];
                $staffsalary=$_POST["staffsalary"];
                $staffrole=$_POST["staffrole"];
                $staffid=$_POST["staffid"];

                $edit="UPDATE STAFF
                        set staffname ='$staffname',
                            staffphone ='$staffphone',
                            staffadd ='$staffadd',
                            staffsalary ='$staffsalary',
                            staffrole ='$staffrole'
                        where staffid ='$staffid'; ";
                $result=$conn->query($edit);
                if($result==true)
                {
                    $sql = "SELECT * from STAFF";
                    $result=$conn->query($sql);  
                }
            }
            else {
                $sql = "SELECT * FROM STAFF LIMIT $page1,5";
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
            <?php include '../../view/header.html'; ?>
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
                                        <a href="../../views/staff/staff.php">
                                            <button type="button" class="btn float-left"> 
                                                View All Staff
                                            </button>
                                        </a>
                                        <a href="../../views/staff/registerstaff.php">
                                            <button class="btn float-left"> 
                                                Add New Staff
                                            </button>
                                        </a>
                                    </div>
                                    <!-- Search form -->
                                    <form action="staff.php" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" method="GET">
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
                                            <th scope="col" class="sort" data-sort="name">Staff ID</th>
                                            <th scope="col" class="sort" data-sort="name">Staff Name</th>
                                            <th scope="col" class="sort" data-sort="name">Staff Phone</th>
                                            <th scope="col" class="sort" data-sort="name">Staff Address</th>
                                            <th scope="col" class="sort" data-sort="name">Staff Salary</th>
                                            <th scope="col" class="sort" data-sort="name">Staff Role</th>
                                            <th scope="col" class="sort" data-sort="name">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php foreach($val as $row):?>
                                        <tr>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['staffid']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['staffname']; ?></span>
                                                </div>
                                            </div>
                                            </th>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm">0<?php echo $row['staffphone']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['staffadd']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['staffsalary']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $row['staffrole']; ?></span>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="registerstaff.php?edit=<?=$row["staffid"]?>">Edit Staff</a>
                                                <a class="dropdown-item" href="staff.php?delete=<?=$row["staffid"]?>">
                                                    Delete Staff
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

                                                $sql2="SELECT count(*) FROM STAFF WHERE 
                                                (staffid like '%$searching%'
                                                or staffname like '%$searching%'
                                                or staffphone like '%$searching%'
                                                or staffadd like'%$searching%'
                                                or staffsalary like '%$searching%'
                                                or staffrole like '%$searching%')";

                                            } else {
                                                $sql2 = "SELECT count(*) FROM STAFF";
                                            }
                                            $result = $conn->query($sql2);
                                            $pagination = $result->fetch_row();
                                            $count = ceil($pagination[0]/5);
                                            for($pageno=1; $pageno<=$count; $pageno++) {
                                        ?>
                                        <li class="page-item <?php if($_GET["page"] == null) $_GET["page"] = 1; if($_GET["page"] == $pageno) echo "active";?>">
                                            <a class="page-link" href="staff.php?page=<?=$pageno;?>"><?=$pageno;?></a>
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
