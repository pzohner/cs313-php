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

$(document).ready(function() {
  $("#changevisibility").click(function(){

  	if ($("#changevis").css("display") == "none") {
  		// alert("element is hidden: Showing now...")
  		$("#changevis").fadeIn();
  		// $("#changevis").css("visibility", "visible").hide().fadeIn("slow");;
  	} else {
  		// alert("element is visible: Hiding now...")
  		// $("#changevis").css("visibility", "hidden").hide().fadeIn();

  		// fadeOut sets display to "none" which is why I check for it above.
  		$("#changevis").fadeOut("slow");
  	}

  });


});
