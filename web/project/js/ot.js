/*********************************************************
 * SHOP JAVASCRIPT 
 * Author: Dallas Bleak
 *********************************************************/

/*********************************************************
 * JQuery
 *********************************************************/
 $(function() {

   /**************************************************
    * FORM VALIDATION
    **************************************************/
     // create a variable for form and call validation
    var form = $("#form");
    enableFastFormValidation(form);

   /**************************************************
    * FORM VALIDATION FOR ON SUBMTION
    * This function checks validation when the user
    * submits the form
    **************************************************/
    form.submit(function(event) {
        var fName = $("#fname").val();
        var lName = $("#lname").val();
        var lastFour = $("#lfour").val();
        var userName = $("#uname").val();
        var uPass = $("#upass").val();
        var uPass2 = $("#upass2").val();
        var seniority = $("#seniority").val();
        var date = $("#date").val();
        
        validateNameField(fName, event);
        validateNameField(lName, event);
        validatelastFour(lastFour, event);
        validatePass(uPass, event);
        validatePass2(uPass2, event);
        validateSeniority(seniority, event);
        validateDate(date, event);
    });

 });

 function enableFastFormValidation(formElement) {
    var fNameInput = formElement.find("#fname");
    var lNameInput = formElement.find("#lname");
    var lastFourInput = formElement.find("#lfour");
    var userNameInput = formElement.find("#uname");
    var uPassInput = formElement.find("#upass");
    var uPass2Input = formElement.find("#upass2");
    var seniorityInput = formElement.find("#seniority");
    var dateInput = formElement.find("#date");


    fNameInput.blur(function(event) {
        var fName = $(this).val();
        validateFirstNameField(fName, event);

        if (!isValidName(fName)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });

    lNameInput.blur(function(event) {
        var lName = $(this).val();
        validateLastNameField(lName, event);

        if (!isValidName(lName)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });

    lastFourInput.blur(function(event) {
        var lastfour = $(this).val();
        validateLastFourField(lastfour, event);

        if (!isValidLastFour(lastfour)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });

    userNameInput.blur(function(event) {
        var userName = $(this).val();
        validateUsernameField(userName, event);

        if (!isValidUsername(userName)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });

    uPassInput.blur(function(event) {
        var uPass = $(this).val();
        validatePassField(uPass, event);

        if (!isValidPass(uPass)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });

    uPass2Input.blur(function(event) {
        var uPass2 = $(this).val();
        validatePass2Field(uPass2, event);

        if (!isValidPass(uPass2)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });

    seniorityInput.blur(function(event) {
        var seniority = $(this).val();
        validateSeniorityField(seniority, event);

        if (!isValidSeniority(seniority)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });

    dateInput.blur(function(event) {
        var date = $(this).val();
        validateDateField(date, event);

        if (!isValidDate(date)) {
            $(this).css("border", "2px solid red");
        } else {
            $(this).css("border", "2px solid green");
        }
    });
}

/**************************************************
 * FORM VALIDATION FUNCTIONS
 * The following functions are for form validation
 **************************************************/
function validateFirstNameField(fName, event) {
    if (!isValidName(fName)) {
        $("#validFname").css("color", "red").text("Please enter your first name");
        event.preventDefault();
    } else {
        $("#validFname").text("");
    }
}

function validateLastNameField(lName, event) {
    if (!isValidName(lName)) {
        $("#validLname").css("color", "red").text("Please enter your last name");
        event.preventDefault();
    } else {
        $("#validLname").text("");
    }
}

function validateLastFourField(lfour, event) {
    if (!isValidLastFour(lfour)) {
        $("#validLfour").css("color", "red").text("Must be four digits");
        event.preventDefault();
    } else {
        $("#validLfour").text("");
    }
}

function validateUsernameField(uname, event) {
    if (!isValidUsername(uname)) {
        $("#validUname").css("color", "red").text("Must contain first initial of first name, last name, last four");
        event.preventDefault();
    } else {
        $("#validUname").text("");
    }
}

function validatePassField(pass, event) {
    if (!isValidPass(pass)) {
        $("#validPass1").css("color", "red").text("Your password must conatain: One letter, One number, At least 8 charachters long");
        event.preventDefault();
    } else {
        $("#validPass1").text("");
    }
}

function validatePass2Field(pass, event) {
    if (!isValidPass(pass)) {
        $("#validPass2").css("color", "red").text("Your password must conatain: One letter, One number, At least 8 charachters long");
        event.preventDefault();
    } else {
        $("#validPass2").text("");
    }
}

function validateSeniorityField(seniority, event) {
    if (!isValidSeniority(seniority)) {
        $("#validSeniority").css("color", "red").text("Must be between 1-99");
        event.preventDefault();
    } else {
        $("#validSeniority").text("");
    }
}

function validateDateField(date, event) {
    if (!isValidDate(date)) {
        $("#validDate").css("color", "red").text("Date format: Jun 02 2002");
        event.preventDefault();
    } else {
        $("#validDate").text("");
    }
}

function isValidName(name) {
    return name !== "";
}

function isValidLastFour(lfour) {
    return /^(?=.*\d)[\d]{4,4}$/.test(lfour);
}

function isValidUsername(uname) {
    return /^([a-zA-Z]{2,})(\d{4,4})$/.test(uname);
}

function isValidPass(upass) {
    return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(upass);
}

function isValidSeniority(seniority) {
    return  /^(?=.*\d)[1-9]{1,2}$/.test(seniority);
}

function isValidDate(date) {
    return  /^([A-Z]{1})([a-z]{2})(\s{1})(\d{2})(\s{1})(\d{4})$/.test(date);
}

