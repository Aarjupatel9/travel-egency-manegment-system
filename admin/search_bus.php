<?php

$asresult = $_GET('s_point');


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "travel_agency";

$data = array();

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die('Could not connect to the database.');
} else {
    $Select = "SELECT * FROM bus_info WHERE capacity='55'";

    $result = $conn->query($Select);

    $counter = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[$counter] = array(
                "bus_number" => $row["bus_number"],
                "capacity" => $row["capacity"],
                "ac" => $row["ac"],
                "sleeper" => $row["sleeper"],
            );
            $counter++;
            // echo "counter is ". $counter."<br>";
            // echo json_encode($data);
        }

        //echo $data;
        echo json_encode($data);
        // echo ("There is no bus details.... please register with the email..Thank you for ");
        // echo json_encode($host);

    } else {
        echo ("There is no bus details.... please register with the email..Thank you for ");
    }
    $conn->close();
}
