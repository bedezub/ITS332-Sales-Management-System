<?php 
    include '../../config/conn.php';

    class productController {

        static function product() {
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
                $sql="SELECT * FROM product WHERE 
                (prodid like '%$searching%'
                or prodname like '%$searching%'
                or prodcost like '%$searching%'
                or prodprice like'%$searching%'
                or prodtype like '%$searching%'
                or prodquantity like '%$searching%')
                limit $page1, 5";
                $result = $conn->query($sql);
            } 
            else if(isset($_POST["prodname"]))
            {
                $prodname=$_POST["prodname"];
                $prodcost=$_POST["prodcost"];
                $prodprice=$_POST["prodprice"];
                $prodtype=$_POST["prodtype"];
                $prodquantity=$_POST["prodquantity"];
                $prodid=date("yy").rand(100000,999999);

                $add = "INSERT INTO product (prodid,prodname,prodcost,prodprice,prodtype,prodquantity)
                VALUES ($prodid,'$prodname','$prodcost','$prodprice','$prodtype','$prodquantity')";
                
                if(mysqli_query($conn,$add))
                {
                    $sql="SELECT * FROM product";
                    $result = $conn->query($sql);
                }
                else
                {
                    echo"Error !!" . $add . "<br>" . mysqli_error($conn);
                }
            } else {
                $sql = "SELECT * FROM product LIMIT $page1,5";
                $result = $conn->query($sql);
            }
            if($result->num_rows > 0) {
                while($prod = $result->fetch_assoc()) {
                    $val[] = $prod; 
                }
            } else {
                    $val[] = null;
                    echo "No data";
            }
            return $val;
        }

        static function pagination() {

            $conn = openCon();
            if(isset($_GET["search"]) == true) {
                $searching = $_GET["search"];
                $sql2="SELECT count(*) FROM product WHERE 
                (prodid like '%$searching%'
                or prodname like '%$searching%'
                or prodcost like '%$searching%'
                or prodprice like'%$searching%'
                or prodtype like '%$searching%'
                or prodquantity like '%$searching%')";

            } else {
                $sql2 = "SELECT count(*) FROM product";
            }
            $result = $conn->query($sql2);
            $pagination = $result->fetch_row();
            echo "<script>console.log('" . json_encode($pagination) . "');</script>";
            $count = ceil($pagination[0]/5);
            
        }
    }
?>