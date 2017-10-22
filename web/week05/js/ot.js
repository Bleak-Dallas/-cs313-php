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

function validateStates(value, disID) {
    if (/^\s*(A[KLRZ]|C[AOT]|DE|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])\s*$/i.test(value)) {
        return disID.innerHTML = "";
    } else {
        return disID.innerHTML = "Invalid State";
    }
}

function validateZip(value, disID) {
    if (/^\s*\d{5}(-\d{4})?\s*$/.test(value)) {
        return disID.innerHTML = "";
    } else {
        return disID.innerHTML = "Invalid Zip";
    }
}

function validateEmail(value, disID) {
    if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)) {
        return disID.innerHTML = "";
    } else {
        return disID.innerHTML = "Invalid Email";
    }
}

function validatePhone(value, disID) {
    if (/^\s*(\(\d{3}\) ?\d{3}-\d{4}|\d{10})\s*$/.test(value)) {
        return disID.innerHTML = "";
    } else {
        return disID.innerHTML = "Invalid Phone Number";
    }
}

/*********************************************************
 * FUNCTION: INCREASE AND DECREASE PRODUCT QUANTITY
 * This function is used to increase and decrease product
 * quantity
 *********************************************************/
function decrease_by_one(qty1) {
    var productQuantity = parseInt(document.getElementById(qty1).value);
        if (productQuantity > 0) {
            if ((productQuantity -1) > 0) {
                document.getElementById(qty1).value = productQuantity -1;
            }
        }
}

function increase_by_one(qty1) {
    var productQuantity = parseInt(document.getElementById(qty1).value);
    document.getElementById(qty1).value = productQuantity + 1;
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
