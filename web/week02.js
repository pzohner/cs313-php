function clicked() {
	alert("Clicked!");
}

function changecolor() {
	var inputfield = document.getElementsByName("colorchange").value;
	alert(inputfield);
	document.getElementById("unique").backgroundColor = inputfield;
	alert("color has been changed!");
}

