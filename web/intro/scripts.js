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

// The document.ready function allows jquery to wait to do things until the
// document is loaded. IN this case, it waits till the document is loaded
// to assign its click handler. 
$(document).ready(function() {
  $("#changevisibility").click(function() {
    if ($("#changevis").css("display") == "none") {
      $("#changevis").fadeIn();
    } else {
      $("#changevis").fadeOut();
    }
  });
});

