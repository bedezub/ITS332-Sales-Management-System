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