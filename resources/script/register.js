/**
* Author: James Moran
* Purpose: Validates the registration page
* Created: 15/10/2015
* Last updated: 15/10/2015
*  
*/

/*get variables from form and check rules*/
function validate(){
	
	var errMsg = "";
	
	var result = true;
	
	/*get values from the form*/
	var username = document.getElementById("username").value.toLowerCase();
	var password = document.getElementById("password").value;
	var password2 = document.getElementById("password2").value;
	var fname = document.getElementById("fname").value;
	var sname = document.getElementById("sname").value;
	var course = document.getElementById("course").value;
	var yearstarted = document.getElementById("yearstarted").value;
	
	//Verify input lengths
	if (username.length > 20) {
		errMsg += "Username must be less than 20 characters.\n";
	}
	if (password.length > 20) {
		errMsg += "Password must be less than 20 characters.\n";
	}
	if (fname.length > 20) {
		errMsg += "First name must be less than 20 characters.\n";
	}
	if (sname.length > 20) {
		errMsg += "Surname must be less than 20 characters.\n";
	}
	if (course.length > 20) {
		errMsg += "Course title must be less than 40 characters.\n";
	}
	
	//Date check
	if (yearstarted.substring(0,2) > 12) {
		errMsg += "Please enter a valid month.\n";
	}
	
	//Regex
	//Define regular expressions
	var alphanumeric20 = /[a-zA-z0-9]{1,20}/
	var alphanumeric40 = /[a-zA-z0-9]{1,40}/
	var date = /\d{2}\-\d{2}/
	if (!alphanumeric20.test(username)) {
		errMsg += "Username must only contain alphanumeric characters.\n";
	}
	if (!alphanumeric20.test(password)) {
		errMsg += "Password must only contain alphanumeric characters.\n";
	}
	if (!alphanumeric20.test(fname)) {
		errMsg += "First name must only contain alphanumeric characters.\n";
	}
	if (!alphanumeric20.test(sname)) {
		errMsg += "Surname must only contain alphanumeric characters.\n";
	}
	if (!alphanumeric40.test(course)) {
		errMsg += "Course title must only contain alphanumeric characters.\n";
	}
	if (!date.test(yearstarted) || yearstarted.length > 5) {
		errMsg += "Start date must be in the format mm-yy.\n";
	}
	
	if (password != password2) {
		errMsg += "Passwords do not match.\n";
	}

	if (errMsg != ""){   //only display message box if there is something to show
		alert(errMsg);
		result = false;
	}
	
	return result;    //if false the infomration will not be sent to the server
}

/* link HTML elements to corresponding event function */
function init () {
	var regForm = document.getElementById("register");// link the variable to the HTML element
	regForm.onsubmit = validate; /* assigns functions to corresponding events */
}

window.onload = init;
