<?php

$ini = parse_ini_file('../conf/config.ini');

// //data from html page
// $str_json = file_get_contents('php://input');
// $text_data = json_decode($str_json);
// $user_email = $text_data->{'user_email'};
// $pass = $text_data->{'pass'};


$user_email = $_POST['user_email'];
$pass = $_POST['pass'];

$conn = new mysqli($ini['host'], $ini['dbUsername'], $ini['dbPassword'], $ini['dbName']);


if ($conn->connect_error) {
    die('Could not connect to the database.');
} else {
    $Select = "SELECT password FROM admin_info WHERE email = '$user_email' ";
    $result = $conn->query($Select);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            if ($pass == $row["password"]) {
                $conn->close();
                include '../admin/admin.html';
            } else {

                echo "password wrong.....";
            }
        }
    } else {
        echo  "user is not exits";
    }
    $conn->close();
}
