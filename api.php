<?php
$conn = mysqli_connect("localhost", "root", "", "loginsystem");
$response = array();
if ($conn) {
    $sql = "select * from loginform ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Content-Type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['id'] = $row['id'];
            $response[$i]['full_name'] = $row['full_name'];
            $response[$i]['email'] = $row['email'];
            $response[$i]['password'] = $row['password'];
            $response[$i]['phone_number'] = $row['phone_number'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo "Database connection failed";
}
?>