<?php

echo "enter in php<br>";

if (isset($_POST['bus_num']) && isset($_POST['capacity'])) {

    $busnum = $_POST['bus_num'];
    $cap = $_POST['capacity'];
    $ac = $_POST['ac'];
    $sleeper = $_POST['sleeper'];

    // $crp = crypt($password, "st");
    // echo $crp;
    //echo $username;  // +  " " + $password + " " + $ema + " " + $phone + "<br>";

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "travel_agency";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    } else {
        $Select = "SELECT bus_number FROM bus_info WHERE bus_number = ? LIMIT 1";
        $Insert = "INSERT INTO bus_info(bus_number, capacity, ac,sleeper) values(?, ?, ?, ?)";

        $stmt = $conn->prepare($Select);
        $stmt->bind_param("s", $busnum);
        $stmt->execute();
        $stmt->bind_result($resultEmail);
        $stmt->store_result();
        $stmt->fetch();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($Insert);
            $stmt->bind_param("sssi", $busnum, $cap, $ac, $sleeper);
            if ($stmt->execute()) {
                echo "New record inserted sucessfully.";
            } else {

                echo $stmt->error;

            }
        } else {
            echo "already one This bus is regisrterd....";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "All field are required.";
    die();
}
// } else {
//     echo "Submit button is not set";
// }
