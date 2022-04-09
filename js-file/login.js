function regclick()
{
    window.location("register.html");
}

function log() {
  var user_email = document.getElementById("email").value;
  var pass = document.getElementById("password").value;

  var data =
    '{"user_email":"' +
    user_email +
    '", "pass":"' +
    pass +
    '"}';
  var data_json = JSON.parse(data);

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var res = this.responseText;
      //var res_json = JSON.parse(this.responseText);
      if (res == "1") {
        window.alert("sucessfully loged in .... enjoy!!!! ");
      } else if (res == "0") {
        window.alert("Wrong Password try again");
      }
      else if (res == "2") {
          window.alert("there is no account with this email id...you have to sign in first.. thank you!!");
      } else {
        console.log(res);
      }
    }
  };
  xmlhttp.open("POST", "../php-file/login.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xmlhttp.send(data);
}