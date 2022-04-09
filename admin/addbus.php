<?php

$json_data = file_get_contents('php://input');

// $P_jdata = json_encode($json_data);
// echo $P_jdata->bus_name;



$normal_data = json_decode($json_data);
echo $json_data['bus_number'];


$jsonString = '{
    "firstName":"Olivia",
    "lastName":"Mason",
    "dateOfBirth":
    {
        "year":"1999",
        "month":"06",
        "day":"19"
    }
}';
// $data = json_decode($jsonString, true);

//var_dump($data);

// echo '{
//     "firstName":"Olivia",
//     "lastName":"Mason",
//     "dateOfBirth":
//     {
//         "year":"1999",
//         "month":"06",
//         "day":"19"
//     }
// }';

//echo "1";

// $busnum = $json_data['bus_number'];
// echo $busnum;


// $value = $normal_data['ac'];   //['bus_number']['1'];
// echo $value;

//$cap = $normal_data['capacity'];
//$ac = $normal_data['ac'];
//$sleeper = $normal_data['sleeperxa'];

// // $crp = crypt($password, "st");
// // echo $crp;
// //echo $username;  // +  " " + $password + " " + $ema + " " + $phone + "<br>";

// $host = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "travel_agency";

// $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// if ($conn->connect_error) {
//     die('Could not connect to the database.');
// } else {
//     $Select = "SELECT bus_number FROM bus_info WHERE bus_number = ? LIMIT 1";
//     $Insert = "INSERT INTO bus_info(bus_number, capacity, ac,sleeper) values(?, ?, ?, ?)";

//     $stmt = $conn->prepare($Select);
//     $stmt->bind_param("s", $busnum);
//     $stmt->execute();
//     $stmt->bind_result($resultEmail);
//     $stmt->store_result();
//     $stmt->fetch();
//     $rnum = $stmt->num_rows;

//     if ($rnum == 0) {
//         $stmt->close();

//         $stmt = $conn->prepare($Insert);
//         $stmt->bind_param("ssss", $busnum, $cap, $ac, $sleeper);
//         if ($stmt->execute()) {
//             echo "New record inserted sucessfully.";
//         } else {

//             //echo $stmt->error;
//         }
//     } else {
//         //echo "already one This bus is regisrterd....";
//     }

//     $stmt->close();
//     $conn->close();
// }
// // } else {
// //     echo "All field are required.";
// //     die();
// // }
// // } else {
// //     echo "Submit button is not set";
// // }
