<!DOCTYPE html>
<html>
    <head> 
        <title>
            VMOG Vape Store System
        </title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        
        <script type="text/javascript">
        function confirmDelete(prodid)
        {
            if(confirm('sure to remove this record?'))
            {
                window.location.href='deleteproduct.php?prodid='+prodid;
            }
        }
        </script>
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
                <h3>Display Product Details</h3>
                <?php

                    include'conn.php';
                    $conn=Opencon();
                    
                    $prodid=$_GET["prodid"];
                    $sql = "SELECT * FROM product where prodid='$prodid'";
                    $result = $conn->query($sql);

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


                            echo"<table>";
                                    echo"<tr>";
                                        echo"<td>Product ID</td>";
                                        echo"<td>$prodid</td>";
                                    echo"<tr>"; 
                                    echo"<tr>";
                                        echo"<td>Product name</td>";
                                        echo"<td>$prodname</td>";
                                    echo"<tr>"; 
                                    echo"<tr>";
                                        echo"<td>Product Cost</td>";
                                        echo"<td>$prodcost</td>";
                                    echo"<tr>"; 
                                    echo"<tr>";
                                        echo"<td>Product Price</td>";
                                        echo"<td>$prodprice</td>";
                                    echo"<tr>"; 
                                    echo"<tr>";
                                        echo"<td>Product Type</td>";
                                        echo"<td>$prodtype</td>";
                                    echo"<tr>"; 
                                    echo"<tr>";
                                        echo"<td>SProduct Quantity</td>";
                                        echo"<td>$prodquantity</td>";
                                    echo"<tr>"; 


                        }
                    }
                    else
                    {
                        echo"Data cannot be displayed";
                    }
                    CloseCon($conn);
                ?>
                <table>
                    <tr>
                        <td colspan="2" align="center">
                        <input type="submit" value="Update" onclick="window.location.href='updateproduct.php?prodid=<?php echo $prodid?>'"/>
                        <input type="button" value="Delete" onclick="confirmDelete(<?php echo $prodid?>)"/>
                        <input type="button" value="Back" onclick="history.back()" />

                        </td>
                    </tr>
                </table>
            </article>
        </section>

       <footer>
          <?php include "footer.php"?>
       </footer>
    </body>
</html>