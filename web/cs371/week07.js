/*********************************************************
 * WEEK 07 JAVASCRIPT 
 * Author: Dallas Bleak
 *********************************************************/

/*********************************************************
 * FUNCTION: UNIT PRICE
 * This function creates objects to be used within
 * other functions
 *********************************************************/
function selectUnit(unit5x5, unit5x10, unit10x10, unit10x15, unit10x20, tax) {
    this.unit5x5 = unit5x5;
    this.unit5x10 = unit5x10;
    this.unit10x10 = unit10x10;
    this.unit10x15 = unit10x15;
    this.unit10x20 = unit10x20;
    this.tax = tax;
}

/*********************************************************
 * FUNCTION: INITIAL COST
 * This function initiaizes the cost of all units to the
 * Unit object
 *********************************************************/
function initialCost() {
    window.Unit = new selectUnit(44.00, 64.00, 99.00, 134.00, 164.00, 0.08);
}

/*********************************************************
 * FUNCTION: RESERVE UNIT
 * This function send the selected unit to the shopping cart
 *********************************************************/
function reserveUnit(price) {
    var unit = "";
    var cost;
    switch(price) {
        case "44.00":
            unit = "5'x5'";
            cost = Unit.unit5x5.toFixed(2);
            break;
        case "64.00":
            unit = "5'x10'";
            cost = Unit.unit5x10.toFixed(2);
            break;
        case "99.00":
            unit = "10'x10'";
            cost = Unit.unit10x10.toFixed(2);
            break;
        case "134.00":
            unit = "10'x15'";
            cost = Unit.unit10x15.toFixed(2);
            break;
        case "164.00":
            unit = "10'x20'";
            cost = Unit.unit10x20.toFixed(2);
            break;
        default:
            unit = "";
            break;
    }
    document.getElementById("unit").value = unit;
    document.getElementById("unitcost").value = cost;
    document.getElementById("tax1").value = calcTax(price).toFixed(2);
    document.getElementById("total").value = calcTotal(price).toFixed(2);
    // display the cart
    document.getElementById("Shop").style.display = "none";
    document.getElementById("Cart").style.display = "inherit";
    document.getElementById("Signin").style.display = "none";
    document.getElementById("Home").style.display = "none";
    document.getElementById("PayOnline").style.display = "none";
}

/*********************************************************
 * FUNCTION: DISPLAY PAGE
 * This function is used to display the specified page
 *********************************************************/
function displayPage(show, page1, page2, page3, page4) {
    document.getElementById(show).style.display = 'block';
    document.getElementById(page1).style.display = 'none';
    document.getElementById(page2).style.display = 'none';
    document.getElementById(page3).style.display = 'none';
    document.getElementById(page4).style.display = 'none';
}

/*********************************************************
 * FUNCTION: CALCULATE TAX
 * This function is used to calculate the tax for each unit
 *********************************************************/
function calcTax(price) {
    var unitTax;
    switch(price) {
        case "44.00":
            return unitTax = Unit.unit5x5 * Unit.tax;
        case "64.00":
            return unitTax = Unit.unit5x10 * Unit.tax;
        case "99.00":
            return unitTax = Unit.unit10x10 * Unit.tax;
        case "134.00":
            return unitTax = Unit.unit10x15 * Unit.tax;
        case "164.00":
            return unitTax = Unit.unit10x20 * Unit.tax;
        default:
            return unitTax = "";
    }
}

/*********************************************************
 * FUNCTION: CALCULATE TOTAL
 * This function is used to calculate the total for each unit
 *********************************************************/
function calcTotal(price) {
    var unitTotal;
    switch(price) {
        case "44.00":
            return unitTotal = Unit.unit5x5 + calcTax(price);
        case "64.00":
            return unitTotal = Unit.unit5x10 + calcTax(price);
        case "99.00":
            return unitTotal = Unit.unit10x10 + calcTax(price);
        case "134.00":
            return unitTotal = Unit.unit10x15 + calcTax(price);
        case "164.00":
            return unitTotal = Unit.unit10x20 + calcTax(price);
        default:
            return unitTotal = "";
    }
}

/*********************************************************
 * FUNCTION: RESET FORM ALERT
 * Simple function alerting the user that the form was reset
 *********************************************************/
function resALert() {
    alert("The form has been reset. Please try again.");
}

/*********************************************************
 * FUNCTION: VALIDATE USERNAME AND PASSWORD
 * Simple function alerting the user that the form was reset
 *********************************************************/
function validateUserNamePass(username, password, disID) {

    var user = username.value;
    var pass = password.value;


    var isUser = isValidUserName(user);
    var isPass = isValidPassword(pass);
    console.log("USERNAEM: " + user + " PASS: " + pass);
    console.log("USER: " + isUser + " PASS: " + isPass);

    if (isUser && isPass) {
        // display the cart
        document.getElementById("Home").style.display = "none";
        document.getElementById("Shop").style.display = "none";
        document.getElementById("Cart").style.display = "none";
        document.getElementById("SignIn").style.display = "none";
        document.getElementById("PayOnline").style.display = "inherit";
    } else {
        return disID.innerHTML = "Username and Password incorrect";
    }
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

function validateMonth(value, disID) {
    if (/(0[1-9]|1[0-2]|^[1-9]$)/.test(value)) {
        return disID.innerHTML = "";
    } else {
        return disID.innerHTML = "Invalid Month";
    }
}

function validateYear(value, disID) {
    if (value > 17 && value < 100) {
        return disID.innerHTML = "";
    } else {
        return disID.innerHTML = "Invalid Year";
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

function validateCard(value, disID) {
    if (/^\s*((\d{4}\s){3}\d{4}|\d{16})\s*$/.test(value)) {
        return disID.innerHTML = "";
    } else {
        return disID.innerHTML = "Invalid Card Number";
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
function validateUseName(value, disID) {
    if (value === "") {
        return disID.innerHTML = "Username is required";
    } else {
        return disID.innerHTML = "";
    }
}
function validatePassword(value, disID) {
    if (value === "") {
        return disID.innerHTML = "Password is required";
    } else {
        return disID.innerHTML = "";
    }
}
function isValidUserName(value) {
    return value === "testuser";
}
function isValidPassword(value) {
    return value === "testuser";
}