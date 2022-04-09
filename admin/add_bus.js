function callhome() {
  window.location.href = "admin.html";
}

var xjsvar;

function add_bus() {
  console.log("enter in js file");

  var bus_name = document.getElementById("bus_name").value;
  var bus_num = document.getElementById("bus_num").value;
  var capacity = document.getElementById("capacity").value;
  var ac = document.getElementById("ac").value;
  var sleeper = document.getElementById("sleeper").value;

  if (
    bus_name == "" ||
    bus_num == "" ||
    capacity == "" ||
    ac == "" ||
    sleeper == ""
  ) {
    window.alert("please enter full details");
    return;
  }

  // const data = {
  //   bus_name: bus_name,
  //   bus_number: bus_num,
  //   capacity: capacity,
  //   ac: ac,
  //   sleeper: sleeper,
  // };

  const text =
    '{"bus_name": " ' +
    bus_name +
    ' ","bus_number": " ' +
    bus_num +
    ' ", "capacity":"' +
    capacity +
    '", "ac":"' +
    ac +
    '", "sleeper":"' +
    sleeper +
    '"}';

  // console.log(text);
  const str_json = JSON.parse(text);
  console.log(str_json);

  request = new XMLHttpRequest();
  request.open("POST", "addbus.php");
  
  request.setRequestHeader("Content-type", "application/json");
  request.onload = function () {
    var jsvar = this.response;
    console.log(jsvar);

    if (jsvar == "1")
    {
      window.alert("Bus info is added successfullly..")
      }
    xjsvar = JSON.stringify(jsvar);
    console.log(xjsvar);
  };
  request.send(str_json);


    //  $.ajax({
    //    type: "POST", //type of method
    //    url: "profile.php", //your page
    //    data: { bus_name : bus_name, bus_number : bus_num, capacity : capacity, ac : ac, sleeper : sleeper }, // passing the values
    //    success: function (res) {
    //      //do what you want here...
    //    },
    //  });
}
