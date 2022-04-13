function regi() {
  var user_email = document.getElementById("user_email").value;
  var pass = document.getElementById("pass").value;
  var user_name = document.getElementById("user_name").value;
  var p_number = document.getElementById("p_number").value;


  var data =
    '{"user_email":"' +
    user_email +
    '", "pass":"' +
    pass +
    '", "user_name":"' +
    user_name +
    '", "p_number":"' +
    p_number +
    '"}';
  var data_json = JSON.parse(data);

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var res = this.responseText;
      //var res_json = JSON.parse(this.responseText);
      if (res == "New record inserted sucessfully") {
        window.alert("New record inserted sucessfully ");
      } else if (res == "0") {
        window.alert("You already register with this email id");
      } else {
        console.log(res);
      }
    }
  };
  xmlhttp.open("POST", "../php-file/register.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xmlhttp.send(data);
}
