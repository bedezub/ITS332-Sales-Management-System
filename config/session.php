<?php 
    $conn1 = OpenCon();
    session_start();

    $user_check = $_SESSION['login_user'];
    echo '<script>console.log('. json_encode($user_check) .')</script>';
    $sql = "SELECT * FROM staff WHERE staffid = $user_check";
    $result = $conn1->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $login_id = $row['staffid'];
            $login_name = $row['staffname'];
            $login_role = $row['staffrole'];
        }
    } else {
        header("location: ../../views/login/login.php");
        die();
    }

    CloseCon($conn1);
?>