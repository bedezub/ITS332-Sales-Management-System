<!DOCTYPE html>
<html>
    <head> 
        <title>
            VMOG Vape Store System
        </title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        
    </head>
    <body>
        <header>
            <?php include "header.php" ?>
        </header>

        <section>
            <nav>
                <?php include "navigation.php" ?>
            </nav>
            <article>
                <h3 style="text-align:center">Display all product from the databse</h3>
                <?php
                    
                    include'conn.php';
                    $conn = OpenCon();

                    $page = 0;
                    if(isset($_GET["page"]) == true) {

                        $page = $_GET["page"];
                    } else {

                        $page = 0;
                    }

                    if($page=="" | $page == "1") {
                        $page1 = 0;
                    } else {
                        $page1 = ($page*4)-4;
                    }
                    $sql = "SELECT * FROM product LIMIT $page1,4";
                    $result = $conn->query($sql);

                    echo "<table>";
                        echo "<th>Product ID</th>";
                        echo "<th>Product Name</th>";
                        echo "<th>Product Cost</th>";
                        echo "<th>Product Price</th>";
                        echo "<th>Product Type</th>";
                        echo "<th>Product Quantity</th>";
                    if($result->num_rows > 0) 
                    {
                        while($row = $result->fetch_assoc()) 
                        
                        {

                            $today=date("y-m-d");
                            $prodid=$row["prodid"];
                            $prodname=$row["prodname"];
                            $prodcost=$row["prodcost"];
                            $prodprice=$row["prodprice"];
                            $prodtype=$row["prodtype"];
                            $prodquantity=$row["prodquantity"];

                            
                            echo "<tr>";
                                //echo "<td>$studentid</td>";
                                echo"<td><a href =displayproductdetails.php?prodid=$prodid>$prodid</a></td>";
                                echo "<td>$prodname</td>";
                                echo "<td>$prodcost</td>";
                                echo "<td>$prodprice</td>";
                                echo "<td>$prodtype</td>";
                                echo "<td>$prodquantity</td>";
                            echo "<tr>";
                        }
                    } else {
                        echo "Error in fetching data";
                    }
                    echo "</table>";

                    $sql2 = "SELECT count(*) FROM product";
                    $result = $conn->query($sql2);
                    $row = $result->fetch_row();
                    $count = ceil($row[0]/4);

                    for($pageno=1; $pageno<=$count; $pageno++) {
                        ?><a href="displayproduct.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " "; ?></a>
                        
                        <?php
                    }
                    CloseCon($conn);

                ?>
            </article>
        </section>
       <footer>
            <?php include "footer.php"?>
       </footer>
    </body>
</html>