//globle declaration
var available_ticket;
var xjsvar;
var departure_time;

window.onload = function () {
  var url = document.location.href,
    params = url.split("?")[1].split("&"),
    data = {},
    tmp;
  for (var i = 0, l = params.length; i < l; i++) {
    tmp = params[i].split("=");
    data[tmp[0]] = tmp[1];
  }

  var bus_name = data.bus_name;
  var source = data.source;
  var destination = data.destination;
  var pickup_time = data.pickup_time;
  available_ticket = data.available_ticket;
  var travelling_date = data.t_date;
  var price_per_ticket_1 = data.price;
  departure_time = data.pickup_time;

  let d = new Date(travelling_date);
  document.getElementById("starting_point").value = source;
  document.getElementById("destination").value = destination;
  document.getElementById("travelling_date").value = travelling_date;
  document.getElementById("bus_name").value = bus_name;
  document.getElementById("price").value = price_per_ticket_1;
  document.getElementById("number_of_sit").value = 1;
  document.getElementById("total_price").value = price_per_ticket_1;
  console.log(data.price_per_ticket_1);

  // for fetching bus number from database
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var res_json = JSON.parse(this.responseText);
      // xjsvar = res_json;
      document.getElementById("bus_number").value = res_json[0].bus_number;
      console.log(res_json);
      console.log(res_json[0].bus_number);
    }
  };
  xmlhttp.open(
    "GET",
    "../php-file/get_bus_info_for_booking.php?s_point=" +
      source +
      "&destination=" +
      destination +
      "&date=" +
      travelling_date +
      "&bus_name=" +
      bus_name +
      "&pickup_time=" +
      pickup_time,
    true
  );
  xmlhttp.send();
};

function onbooking() {
  var nofsit = document.getElementById("number_of_sit").value;
  if (nofsit == "") {
    window.alert("enter number of ticket for book");
    return;
  } else if (nofsit > available_ticket) {
    window.alert("only  " + available_ticket + "  ticket is available");
    return;
  } else {
    //getting data from html page for booking

    var bus_number = document.getElementById("bus_number").value;
    var tra_date = document.getElementById("travelling_date").value;
    var nosit = document.getElementById("number_of_sit").value;
    var t_price = document.getElementById("total_price").value;
    var user_email = document.getElementById("user_email").value;
    var pass = document.getElementById("pass").value;

    let d = new Date(tra_date);
    //date validation for database sutability
    let travel_date =
      d.getDate() + "_" + (d.getMonth() + 1) + "_" + d.getFullYear();




    var booking_data ='{"bus_number":"' + bus_number + '", "tra_date":"' + travel_date + '", "nosit":"' +nosit +'","t_price":"' + t_price + '","departure_time":"' + departure_time + '","user_email":"' +user_email +'","pass":"' +pass + '"}';
    var data_json = JSON.parse(booking_data);
    console.log(data_json);
    console.log("redy for booking");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {

        var res = this.responseText;
        //var res_json = JSON.parse(this.responseText);
        if (res == "1")
        {
          window.alert("ticket booked successfully");
        }
        else if (res == "0")
        {
          window.alert("This user is not exits ...  please register first");
        }
        else if (res == "wrong password")
        {
          windows.alert("Wrong Password...");
        }
        else {
          console.log("res");
        }
  
      }
    };
    xmlhttp.open("POST", "../php-file/booking.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(booking_data);
  }
}

function get_total_price() {
  var nos = document.getElementById("number_of_sit").value;
  var price = document.getElementById("price").value;
  var total_price = nos * price;
  document.getElementById("total_price").value = total_price;
}

//below this there are not usefull function(for testing perpose)
function get_bus_info() {
  console.log("enter in js file");

  let s_point = document.getElementById("starting_point").value;
  let destination = document.getElementById("destination").value;
  let d = new Date(document.getElementById("travelling_date").value);
  //date validation for database sutability
  let travelling_date =
    d.getDate() + "_" + (d.getMonth() + 1) + "_" + d.getFullYear();
}

function testJS() {
  console.log("enter in js file");

  let s_point = document.getElementById("starting_point").value;
  let destination = document.getElementById("destination").value;
  let d = new Date(document.getElementById("travelling_date").value);
  //date validation for database sutability
  let travelling_date =
    d.getDate() + "_" + (d.getMonth() + 1) + "_" + d.getFullYear();

  var b = document.getElementById("name").value,
    url =
      "http://path_to_your_html_files/next.html?name=" + encodeURIComponent(b);

  document.location.href = url;
}
