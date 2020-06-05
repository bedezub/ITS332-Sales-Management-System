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
                <h3 style="text-align: center;">Insert New Product</h3><br>
                <form action="insertproduct.php" id="form" method="POST">
        
            <table>
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="prodname" maxlength="100" placeholder="Caliburn" required><br></td>
                </tr>
                <tr>
                    <td>Product Cost</td>
                    <td><input type="float" name="prodcost" maxlength="100" required><br></td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td><input type="double" name="prodprice" maxlength="100" required><br></td>
                </tr>
                <tr>
                    <td>Product Quantity</td>
                    <td><input type="text" name="prodquantity" maxlength="10"required><br></td>
                </tr>
                <tr>
                    <td>Product Type</td>
                    <td>
                        <select name="prodtype" id="type" required>
                            <option value="Mode">Mode</option>
                            <option value="Flavour">Flavour</option>
                            <option value="Equipement">Equipement</option>
                        </select><br>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="submit">
                        <input type="reset" value="reset">
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