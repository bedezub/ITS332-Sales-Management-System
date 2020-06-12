<?php
        function openCon()
        {
            $dbhost="localhost";
            $dbuser="root";
            $dbpass="";
            $db="sales";
            $conn=new mysqli($dbhost,$dbuser,$dbpass,$db)
                    or die("connect failed %\n" . $conn->error);
            return $conn;
        }
        function closeCon($conn)
        {
            $conn->close();
        }
?>