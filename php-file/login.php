<?php
//config file
$ini = parse_ini_file('../conf/config.ini');

//data from html page
$str_json = file_get_contents('php://input');
$text_data = json_decode($str_json);

$email = $text_data->{'user_email'};
$password = $text_data->{'pass'};


$conn = new mysqli($ini['host'], $ini['dbUsername'], $ini['dbPassword'], $ini['dbName']);

if ($conn->connect_error) {
    die('Could not connect to the database.');
} else {


    $Select = "SELECT password FROM user_login_info WHERE email = '$email' ";
    $result = $conn->query($Select);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            if ($password == $row["password"]) {
                echo "1";
            } else {
                echo "0";
            }
        }
    } else {
        echo "2";
    }

    $conn->close();
}
