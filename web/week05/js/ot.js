/*********************************************************
 * SHOP JAVASCRIPT 
 * Author: Dallas Bleak
 *********************************************************/


/*********************************************************
 * FUNCTION: RESET FORM ALERT
 * Simple function alerting the user that the form was reset
 *********************************************************/
function resALert() {
    alert("The form has been reset. Please try again.");
}

/*********************************************************
 * FORM VALIDATION FUNCTIONS
 * The funtions below are used for input validation
 *********************************************************/
function checkEmptyField (value, disID) {
    if (value === "") {
        return disID.innerHTML = "This field is required";
    } else {
        return disID.innerHTML = "";
    }
}

/*********************************************************
 * CHANGE BUTTON FUNCTION
 * The funtions below are used for input validation
 *********************************************************/
function changebtn (disID) {

    }
    if (document.getElementById(disID).checked == 'update_radio') {
        document.getElementById('change_btn').className = "submit_btn";
    }
    if (document.getElementById('delete_radio').checked) {
        document.getElementById('change_btn').className = "delete_btn";
    }
}

/*********************************************************
 * FUNCTION: RETRIEVE TEXT FILE
 * This retrieves the information from the country txt file
 * and then parses it into a table for viewing
 *********************************************************/
function retrieveTextFile(file) {
    var doc = new XMLHttpRequest();

    if (doc !== null) {
        doc.onreadystatechange = function() {
            if (doc.readyState == 4 && doc.status == 200) {
                var res = doc.responseText.split("\n");
                var result = "<tr><th>City & Population</th></tr>";
                for (var i = 0; i < res.length - 1; i++) {
                    result += "<tr><td>" + res[i] + "</td></tr>";
                }
                document.getElementById("cityInfo").innerHTML = result;
                console.log(res);
            }
        };
    }
    doc.open("GET", file, true);
    doc.send();
}

/*********************************************************
 * FUNCTION: RETRIEVE JSON FILE
 * This retrieves the information from the student json file
 * and then parses it into a table for viewing
 *********************************************************/
function retrieveJsonFile() { 
    var request = new XMLHttpRequest(); 
    var file = document.getElementById("fileJSON").value;

    if (request !== null) {
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                var parsedData="<tr><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Zip</th><th>Major</th><th>GPA</th></tr>";
                for (var i = 0; i < data.students.length; i++) {
                    parsedData += "<tr><td>" + data.students[i].first + "</td>" +
                                  "<td>" + data.students[i].last + "</td>" +
                                  "<td>" + data.students[i].address.city + "</td>" +
                                  "<td>" + data.students[i].address.state + "</td>" +
                                  "<td>" + data.students[i].address.zip + "</td>" +
                                  "<td>" + data.students[i].major + "</td>" +
                                  "<td>" + data.students[i].gpa + "</td></tr>";
                }
                document.getElementById("studentInfo").innerHTML = parsedData;
            }
        };
    }
    request.open("GET", "../" + file, true);
    request.send();
}
