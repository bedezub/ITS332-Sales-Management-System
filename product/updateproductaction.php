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
                <h2 style="text-align:center">Updating Product in Database</h2>
                <?php
                    
                    $prodname=$_POST["prodname"];
                   $prodcost=$_POST["prodcost"];
                   $prodprice=$_POST["prodprice"];
                   $prodtype=$_POST["prodtype"];
                   $prodquantity=$_POST["prodquantity"];
                   $prodid=$_POST["prodid"];

                    include'conn.php';
                    $conn=Opencon();

                    $sql="UPDATE product
                            set prodname ='$prodname',
                                prodcost ='$prodcost',
                                prodprice ='$prodprice',
                                prodtype ='$prodtype',
                                prodquantity ='$prodquantity'
                            where prodid ='$prodid'; ";
                    $result=$conn->query($sql);

                    if($result==true)
                    {
                        $sql2 = "SELECT * from product where prodid='$prodid'";
                        $result=$conn->query($sql2);   

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
                                        echo"<td> Product Quantity</td>";
                                        echo"<td>$prodquantity</td>";
                                    echo"<tr>"; 

                            }
                        }
                        else
                        {
                            echo"Data Cannot be displayed";
                        }
                    }
                    else
                    {
                        echo"Error:" . $sql ."<br>" . mysqli_error($conn);
                    }

                    CloseCon($conn);
                ?>;
                <table>
                    <tr>
                        <td colspan="2" align="center">
                        <input type="button" value="Home" onclick="window.location.href='homepage.php'"/>    
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