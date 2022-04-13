<?php
//config file
$ini = parse_ini_file('../conf/config.ini');

//data from html page
$str_json = file_get_contents('php://input');
$text_data = json_decode($str_json);

// echo $str_json;


$bus_number = $text_data->{'bus_number'};
$tra_date = $text_data->{'tra_date'};
$nosit = $text_data->{'nosit'};
$t_price = $text_data->{'t_price'};
$user_email = $text_data->{'user_email'};
$pass = $text_data->{'pass'};
$departure_time = $text_data->{'departure_time'};

//array initialization
//echo $user_email;
$route_data = array();


//database connection sentances
$conn = new mysqli($ini['host'], $ini['dbUsername'], $ini['dbPassword'], $ini['dbName']);
if ($conn->connect_error) {
    // die('Could not connect to the database.');
    echo "server is down.....";
} else {

    //first we have to check if user exits or not
    $Select_user = "SELECT password FROM user_login_info WHERE email='$user_email'";
    $select_user_result = $conn->query($Select_user);
    //checking that user exit or not,, row present than exits else not
    if ($select_user_result->num_rows > 0) {
        //cheking for password is correct or not
        $counter = 0;
        while ($row = $select_user_result->fetch_assoc()) {
            //for each row data is stored into 2D array
            $password_data[$counter] = array(
                "password" => $row["password"]
            );
            $counter++;
        }

        if ($pass == $password_data[0]["password"]) {
            //user exits and fill tickets section
            //number of filled ticket

            $table_name = "ticket_" . $tra_date . "_" . $bus_number;
            $que = "SELECT sit_number from $table_name";
            $que_result = $conn->query($que);

            $reserved_ticket = $que_result->num_rows + 1;
            $ticket_num = $reserved_ticket + $nosit;

            //book ticket for no_of_sit times
            for ($i = $reserved_ticket; $i < $ticket_num; $i++) {

                $ticket_book_query = "INSERT INTO $table_name(sit_number, user_email) VALUES (?,?)";
                // $result_query = $conn->query($ticket_book_query);
                $stmt = $conn->prepare($ticket_book_query);
                $stmt->bind_param("is",$i,$user_email);
                $stmt->execute();
            }
            echo "1";
        } else {
            //password is wrong send alert massage
            echo "wrong password";
        }
    } else {
        //user not exits
        echo "0";
    }
}


// function ticket_fillup(){

    
// }
