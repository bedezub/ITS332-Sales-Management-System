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
                <h3 style="text-align:center">Updating Form</h3>
                <form action="updateproductaction.php" id="updateform" method="POST">

                <?php

                    include'conn.php';
                    $conn= Opencon();

                    $prodid=$_GET["prodid"];
                    $sql="SELECT * from product where prodid= '$prodid'";
                    $result=$conn->query($sql);

                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
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
                                    echo"<td>"?><input type="text" name="prodid" value="<?php echo $prodid;?>" readonly><?php "</td>";
                                echo"</tr>";
                                echo"<tr>";
                                    echo"<td>Product Name</td>";
                                    echo"<td>"?><input type="text" name="prodname" value="<?php echo $prodname;?>" ><?php "</td>";
                                echo"</tr>";
                                echo"<tr>";
                                    echo"<td>Product Cost</td>";
                                    echo"<td>"?><input type="double" name="prodcost" value="<?php echo $prodcost;?>" ><?php "</td>";
                                echo"</tr>";
                                echo"<tr>";
                                    echo"<td>Product Price</td>";
                                    echo"<td>"?><input type="double" name="prodprice" value="<?php echo $prodprice;?>" ><?php "</td>";
                                echo"</tr>";
                                echo"<tr>";
                                    echo"<td>Product Quantity</td>";
                                    echo"<td>"?><input type="text" name="prodquantity" value="<?php echo $prodquantity;?>" ><?php "</td>";
                                echo"</tr>";
                                echo"<tr>";
                                echo"<td>Product Type</td>";
                                    echo"<td>"?>
                                        <select name="prodtype" id="type" required>
                                            <option value="Mode" <?php if($prodtype=="Mode") echo "SELECTED:"?>>Mode</option>
                                            <option value="Flavour" <?php if($prodtype=="Flavour") echo "SELECTED:"?>>Flavour</option>
                                            <option value="Equipement" <?php if($prodtype=="Equipement") echo "SELECTED:"?>>Equipement</option>
                                        </select>   
                                <?php "</td>";
                            echo"</tr>";
                        }

                    }
                    else
                    {
                        echo"Data cannot be updated";
                    }
                    CloseCon($conn);
                ?>

                
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="submit" />
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