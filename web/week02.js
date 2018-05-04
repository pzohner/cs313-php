function clicked() {
	alert("Clicked!");
}


function changecolor() {




	var inputfield = document.getElementById("input").value;
	alert(inputfield);
	$("#unique").css('background-color', inputfield);

	// document.getElementById("unique").style.backgroundColor = inputfield;
	// alert("color has been changed!");
}


$("#changevisibility").click(function(){ 
	$("#changevis").css("visibility", "hidden");
});