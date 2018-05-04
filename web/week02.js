function clicked() {
	alert("Clicked!");
}


function changecolor() {
	var inputfield = document.getElementById("input").value;
	alert(inputfield);
	$("#unique").css('background-color', inputfield);

	// This is if you wanted to do the above in javascript
	// document.getElementById("unique").style.backgroundColor = inputfield;
	// alert("color has been changed!");
}


