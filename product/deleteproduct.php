<!DOCTYPE html>
<html>
    <head> 
        <title>
            Student registeration system
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
                <h3 style="text-align:center">Delete Product</h3>
                <?php
                    $prodid=$_GET["prodid"];

                    include'conn.php';
                    $conn=Opencon();

                    $sql="delete from product where prodid=$prodid";
                    $result=$conn->query($sql);
                    if(!$result)
                    {
                        die('could not delete the data'. mysqli_error($link) );
                    }
                    else
                    {
                        echo "Data has been deleted";
                    }

                ?>
            </article>
        </section>

       <footer>
          <?php include "footer.php"?>
       </footer>
    </body>
</html>