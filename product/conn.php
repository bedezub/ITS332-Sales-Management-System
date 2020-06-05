<?php
    function Opencon()
    {
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $db="sales";

        $conn=new mysqli($dbhost,$dbuser,$dbpass,$db)
                or die("connect failed %\n" . $conn->error);
        return $conn;
    }
    function CloseCon($conn)
    {
        $conn->close();
    }
?>