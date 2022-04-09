function callhome() {
  window.location.href = "admin.html";
}

var xjsvar;

function get_bus_info() {
  console.log("enter in js file");

  let s_point = document.getElementById("starting_point").value;
  let destination = document.getElementById("destination").value;

  // console.log(s_point);
  // console.log(destination);

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var res_json = JSON.parse(this.responseText);

      xjsvar = res_json;

      console.log(res_json);
      addTable();
      
    }
  };
  xmlhttp.open(
    "GET",
    "search_bus.php?s_point=" + s_point + "&destination=" + destination,
    true
  );
  xmlhttp.send();
}

function addTable() {
  var text =
    "<tr><td>bus</td><td>source</td><td>destination</td><td>time</td></tr>";

  document.getElementById("route_data").innerHTML = text;

  for (var i = 0; i < xjsvar.length; i++) {
    text =
      "<tr><td>" +
      xjsvar[i].bus_name +
      "</td><td>" +
      xjsvar[i].source +
      "</td><td>" +
      xjsvar[i].destination +
      "</td><td>" +
      xjsvar[i].pickup_time +
      "</td></tr>";

    document.getElementById("route_data").innerHTML += text;
  }
}
