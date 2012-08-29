/*
	Website: 		Aaron Makish | Web Developer Portfolio
	URL:	 		http://www.aaronmakish.com
	Developer: 		Aaron Makish
	Date Created: 	20120510
	Last Revised: 	20120529
	Language:		JavaScript

	Website Description:
					Web Developer porfolio website for Aaron Makish
	
	External files:
					index.html
					main.css
*/

window.onload = init;

var $ = function (id) {
	return document.getElementById(id);
} // End $

var textboxes;
var textareas;

// ___Next function: get only elements with nodeType=1
function next(elem) {
	do {
		elem = elem.nextSibling;
	} while (elem && elem.nodeType !=1);
	return elem;
} // End next

function init() {
	var inputs;
	
	// ___Get input elements
	inputs = new Array();
	inputs = document.getElementsByTagName("input");
	
	// ___Get input elements of type="text"
	textboxes = new Array();

	for (var i = 0; i < inputs.length; i++) {
		if ((inputs[i].type) == "text") {
			textboxes.push(inputs[i]);
		} // End if
	} // End for

	// ___validate input elements of type="text" onblur
	for (var i = 0; i < textboxes.length; i++) {
		textboxes[i].onblur = validateInputs;
	} // End for
	
	
	// ___Get textarea elements
	textareas = new Array();
	textareas = document.getElementsByTagName("textarea");

	// ___validate textarea elements onblur
	for (var i = 0; i < textareas.length; i++) {
		textareas[i].onblur = validateInputs;
	} // End for
	
	// ___validate form onsubmit
	$("contact_form").onsubmit = validateForm;
	
} // End init

function validateInputs() {
	var id = this.id;
	var valid = false;
	var code = id.substring(0, id.indexOf("_"));

	// ___Input validity test
	switch (code) {
		case "req":
			valid = (this.value.length > 0);
			break;
		case "email":
			valid = testEmail(this.value);
			break;
		case "phone":
			valid = testPhone(this.value);
			break;	
	} // End switch

	// ___Input validity display control (textbox)
	if (valid) {
		this.className = "";
	} // End if
	else {
		this.className = "invalid";
	} // End else

	// ___Get next input element
	var invalid = next(this);
	
	// ___Input validity display control (message)
	if (invalid) {
	
		if (this.className == "invalid") {
			invalid.className = "	";
		} // End if
		else {
			invalid.className = "hidden";
		} // End else
	}
} // End validateInputs


function testEmail(email) {
	var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
	
	return emailRegEx.test(email);
} // End testEmail

function testPhone(phone) {
	var phoneRegEx = /^\(?[0-9]{3}\)?[\s-.]?[0-9]{3}[\s-.]?[0-9]{4}$/;
	
	return phoneRegEx.test(phone);
} // End testPhone

function validateForm() {
	var valid = true;
	
	// ___Form Validity test
	for (var i = 0; i < textboxes.length; i++) {
		textboxes[i].focus();
		textboxes[i].blur();

		if (textboxes[i].className == "invalid") {
			valid = false;
		} // End if
	} // End for
	
	for (var i = 0; i < textareas.length; i++) {
		textareas[i].focus();
		textareas[i].blur();

		if (textareas[i].className == "invalid") {
			valid = false;
		} // End if
	} // End for
	
	return valid;
} // End validateForm

function displayInvalid() {
	var invalid = $("invalid_first_name");
	
	if (this.className = "invalid") {
		invalid.className = "show";
	} // End if
	else {
		invalid.className = "hidden";
	} // End else
	console.log(invalid.className);
} // End displayCredit

