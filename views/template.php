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
<!DOCTYPE html>
<html>
    <?php include '../../view/head.html'; ?>
    <body>
        <!-- Sidenav -->
        <?php include '../../view/navigation.php'; ?>
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            <?php include '../../view/header.html'; ?>
            <?php include '../../view/stats.html'; ?>
        </div>
        <?php // include 'view/footer.html'; ?> 
        <?php include '../../view/script.html'; ?>
    </body>
</html>
echo '<script>console.log('. json_encode($row) .')</script>';

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

SELECT * FROM `product_sales`
JOIN sales ON product_sales.salesid = sales.salesid

SELECT * FROM product, product_sales WHERE (SELECT (product_sales.psalesid-product_sales.salesid) FROM product_sales) = product.prodid

SELECT prodname FROM product WHERE product.prodid in (SELECT (product_sales.psalesid-product_sales.salesid) FROM product_sales) 

SELECT * FROM product, product_sales, sales WHERE (SELECT (product_sales.psalesid-product_sales.salesid) FROM product_sales WHERE sales.salesid = product_sales.salesid) = product.prodid 


SELECT * FROM product, product_sales, sales 
WHERE (SELECT (product_sales.psalesid-product_sales.salesid) FROM product_sales 
WHERE product_sales.salesid = 2020232094) = product.prodid

SELECT prodname, sales.salesid FROM product, product_sales, sales WHERE (SELECT (product_sales.psalesid-product_sales.salesid) FROM product_sales WHERE product_sales.salesid = 2020232094) = product.prodid 

SELECT prodname, sales.salesid FROM product, product_sales, sales 
WHERE product.prodid in (SELECT (product_sales.psalesid-product_sales.salesid) 
    FROM product_sales WHERE product_sales.salesid = 2020320581)

SELECT prodname FROM product WHERE product.prodid in (SELECT (product_sales.psalesid-product_sales.salesid) 
FROM product_sales WHERE product_sales.salesid = 2020320581)

SELECT (product_sales.psalesid-product_sales.salesid) 
FROM product_sales WHERE product_sales.salesid = 2020320581