<?php

    include_once('../config/conn.php');
    include_once('../config/session.php');
    require('fpdf.php');

    $conn = OpenCon();

    $totalCust = "SELECT count(*) FROM customer";
    $result = $conn->query($totalCust);
    if($result->num_rows > 0) {
        $countCust = $result->fetch_assoc();
    } 

    $totalSales = "SELECT sum(salesquantity) FROM SALES";
    $result = $conn->query($totalSales);
    if($result->num_rows > 0) {
        $countSales = $result->fetch_assoc();
    } 

    $totalProfit = "SELECT sum(salesprofit) FROM SALES";
    $result = $conn->query($totalProfit);
    if($result->num_rows > 0) {
        $calcProfit = $result->fetch_assoc();
    } 

    $restock = "SELECT * FROM PRODUCT WHERE prodquantity < 30 LIMIT 5";
    $result = $conn->query($restock);
    if($result->num_rows > 0) {
        while($calcStock = $result->fetch_assoc()) {
            $val[] = $calcStock;
        }
    } 

    $topCus = "SELECT * FROM SALES 
    JOIN customer ON sales.custid = customer.custid
    WHERE salesquantity > 1000 
    GROUP BY customer.custname
    LIMIT 5";

    $result = $conn->query($topCus);
    if($result->num_rows > 0) {
        while($bestcus = $result->fetch_assoc()) {
            $cus[] = $bestcus;
        }
    }

    $topProduct = "SELECT product.prodname, SUM(product_sales.psalesquantity) AS top_product 
    FROM product_sales JOIN product ON (product_sales.psalesid - product_sales.salesid) = product.prodid 
    GROUP BY product.prodname order by top_product desc limit 1";
    $result = $conn->query($topProduct);
    if($result->num_rows > 0) {
        $bestProduct = $result->fetch_assoc();
        echo '<script>console.log('. json_encode($bestProduct) .')</script>';
    } 

    ob_start();
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(40,10,'Top Product');
    $pdf->Cell(40,20, $bestProduct["prodname"]);
    $pdf->Output();
    ob_end_flush(); 
?>
