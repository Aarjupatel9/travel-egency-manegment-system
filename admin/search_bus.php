<?php
//config file
$ini = parse_ini_file('conf/config.ini');

//data from html page
$s_point = $_GET["s_point"];
$destination = $_GET["destination"];
//empty array for save data from mysql databse
$data = array();

//database connection sentances
$conn = new mysqli($ini['host'], $ini['dbUsername'], $ini['dbPassword'], $ini['dbName']);

if ($conn->connect_error) {
    // die('Could not connect to the database.');
    echo "server is not ok";
} else {
    $Select = "SELECT * FROM route_info WHERE source='$s_point' AND destination='$destination'";

    $result = $conn->query($Select);
    $counter = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            //for each row data is stored into 2D array
            $data[$counter] = array(
                "bus_number" => $row["bus_number"],
                "destination" => $row["destination"],
                "source" => $row["source"],
                "pickup_time" => $row["pickup_time"],
                "daily-ser" => $row["daily_ser"],
                "bus_name" => $row["bus_name"],
            );
            $counter++;
        
        //send data to html page
        echo json_encode($data);
        }

    } else {
        //echo ("There is no bus details.... please register with the email..Thank you for ");
    }
    $conn->close();
}