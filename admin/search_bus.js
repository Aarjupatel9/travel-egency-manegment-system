function callhome() {
  window.location.href = "admin.html";
}

var xjsvar;

function get_bus_info() {
  console.log("enter in js file");

  let s_point = document.getElementById("starting_point").value;

  console.log(s_point);

  var xhr = new XMLHttpRequest(); // simplified for clarity
  xhr.open("GET", "search_bus.php"); // sending as POST
  xhr.onload = function () {
    var jsvar = this.response;
    //console.log(jsvar);
    xjsvar = JSON.parse(jsvar);
    console.log(xjsvar);
  };
  xhr.send();
  //addTable();
}
// cookies zone

function createCookie(name, value, days) {
  var expires;

  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toGMTString();
  } else {
    expires = "";
  }

  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

//new work zonw

function addTable() {
  var myTableDiv = document.getElementById("myDynamicTable");

  var table = document.createElement("TABLE");
  table.border = "1";

  var tableBody = document.createElement("TBODY");
  table.appendChild(tableBody);

  for (var i = 0; i < xjsvar.length; i++) {
    var tr = document.createElement("TR");
    tableBody.appendChild(tr);

    for (var j = 0; j < 1; j++) {
      var td = document.createElement("TD");
      td.width = "";
      td.appendChild(document.createTextNode(xjsvar[i].bus_number));
      tr.appendChild(td);

      var td = document.createElement("TD");
      // td.margin = "20";
      td.width = "75";
      td.appendChild(document.createTextNode(xjsvar[i].capacity));
      tr.appendChild(td);

      var td = document.createElement("TD");
      td.width = "75";
      td.appendChild(document.createTextNode(xjsvar[i].ac));
      tr.appendChild(td);

      var td = document.createElement("TD");
      td.width = "75";
      td.appendChild(document.createTextNode(xjsvar[i].sleeper));
      tr.appendChild(td);
    }
  }
  myTableDiv.appendChild(table);
}

function addRow() {
  var myName = document.getElementById("name");
  var age = document.getElementById("age");
  var table = document.getElementById("myTableData");

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  row.insertCell(0).innerHTML =
    '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
  row.insertCell(1).innerHTML = myName.value;
  row.insertCell(2).innerHTML = age.value;
}
