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
                <h2 style="text-align: center">Result Of Searching</h2>
                <?php 
                    $searching=$_GET["searchfield"];

                    include'conn.php';
                    $conn=Opencon();
                    $page=0;
                    //set variable
                    if(isset($_GET["page"])==true)
                    {
                        $page=$_GET["page"];
                    }
                    else
                    {
                        $page=0;
                    }
                    //algo pagination in sql
                    if($page=="" || $page=="1")
                    {
                        $page1=0;
                    }
                    else
                    {
                        $page1=($page*4)-4;
                    }
                    
                    $sql="SELECT * FROM product WHERE 
                          (prodid like '%$searching%'
                          or prodname like '%$searching%'
                          or prodcost like '%$searching%'
                          or prodprice like'%$searching%'
                          or prodtype like '%$searching%'
                          or prodquantity like '%$searching%')
                          limit $page1, 4";

                    $result=$conn->query($sql);

                    if($result->num_rows>0)
                    {
                        echo "<table>";
                            echo"<tr>";
                                echo"<th>Product ID</th>";
                                echo"<th>Product Name</th>";
                                echo"<th>Product Cost</th>";
                                echo"<th>Product Price</th>";
                                echo"<th>Product Type</th>";
                                echo"<th>Product Quantity</th>";
                            echo"</tr>";

                            while($row=$result->fetch_assoc())
                            {
                                $today=date("y-m-d");
                                $prodid=$row["prodid"];
                                $prodname=$row["prodname"];
                                $prodcost=$row["prodcost"];
                                $prodprice=$row["prodprice"];
                                $prodtype=$row["prodtype"];
                                $prodquantity=$row["prodquantity"];

                                echo "<tr>";
                                    echo"<td>$prodid</td>";
                                    echo"<td>$prodname</td>";
                                    echo"<td>$prodcost</td>";
                                    echo"<td>$prodprice</td>";
                                    echo"<td>$prodtype</td>";
                                    echo"<td>$prodquantity</td>";
                                echo "</tr>";

                                
                            }     
                    }
                    else
                    {
                        echo "No Result";
                    }
                    echo "</table>";

                    //count num of record
                    if($result->num_rows > 0)
                    {
                        $sql2="SELECT count(*) FROM product
                                WHERE (prodid like '%$searching%'
                                or prodname like '%$searching%'
                                or prodcost like '%$searching%'
                                or prodprice like'%$searching%'
                                or prodtype like '%$searching%'
                                or prodquantity like '%$searching%')";
                                
                                $result = $conn->query($sql2);
                                $row = $result -> fetch_row();
                                $count = ceil($row[0]/4);

                        for($pageno=1;$pageno<=$count;$pageno++)
                        {
                            ?><a href="searchproductaction.php?page=<?php echo $pageno ?>searchfield=<?php echo $searching; ?>"
                            style="text-decoration:none"> <?php echo $pageno. " ";?></a><?php
                        }
                    }
                    echo "</table>";
                    CloseCon($conn);
                ?>
                <br>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="button" value="Back" onclick="history.back()" />
                        </td>
                    </tr>
                
            </article>
        </section>
       <footer>
          <?php include "footer.php"?>
       </footer>
    </body>
</html>