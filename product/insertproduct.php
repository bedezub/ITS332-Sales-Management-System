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
                 <?php
                   $prodname=$_POST["prodname"];
                   $prodcost=$_POST["prodcost"];
                   $prodprice=$_POST["prodprice"];
                   $prodtype=$_POST["prodtype"];
                   $prodquantity=$_POST["prodquantity"];
                   $prodid=date("yy").rand(100000,999999);

                   include'conn.php';
                   $conn = OpenCon();

                   $sql= "INSERT INTO product (prodid,prodname,prodcost,prodprice,prodtype,prodquantity)
                            VALUES ($prodid,'$prodname','$prodcost','$prodprice','$prodtype','$prodquantity')";

                    if(mysqli_query($conn,$sql))
                    {
                        //echo"New record created succesfully";
                        $sql2="SELECT * FROM product WHERE prodid=$prodid";
                        //pilih sql mne yg nk run
                        //execute dlm result
                        $result = $conn->query($sql2);
                        //cek klu ada value dlm result
                        if($result->num_rows>0)
                        {
                            //outputdata for each row
                            while($row =$result->fetch_assoc())
                            {
                                //assigned data dlm variable bru
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

                    }
                    else
                    {
                        echo"Error !!" . $sql . "<br>" . mysqli_error($conn);
                    }
                    CloseCon($conn);
                      
                 ?>

                     <tr>
                         <td colspan="2" align="center">
                             <input type="button" value="Home" onclick="window.location.href='homepage.php'" />
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