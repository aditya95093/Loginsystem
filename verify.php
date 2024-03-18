<?php
require('connection.php');

if(isset($_GET['email']) && isset($_GET['code'])) {
    $query = "SELECT * FROM loginform WHERE email = '{$_GET['email']}' AND code = {$_GET['code']}";
    $result = mysqli_query($conn, $query);

    if($result) {
        if(mysqli_num_rows($result) == 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['is_verified'] == 0){
                $update = "UPDATE loginform SET is_verified = 1 WHERE email = '{$result_fetch['email']}'";
                
                if(mysqli_query($conn, $update)){
                    echo "<script>
                    alert('Email verification successful');
                    window.location.href='index.php';
                    </script>";
                }
                else{
                    die("Something went wrong");
                }
            }
            else{
                echo "<script>
                alert('Email already registered');
                window.location.href='index.php';
                </script>";
            }
        }
    }
    else{
        die("Something went wrong");
    }
}
?>
