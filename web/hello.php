<!doctype html>
<html>
<head>
	 <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Week02 Team Assignment</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="week02.js"></script>

	<!-- Including bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


	<style>
		.ifOnlyIKnew {
			background-color: blue;
			font-size: 24px;
		}

		.ifOnlyIKnew:hover {
			font-weight: bold;
		}
	</style>
	</head>
<body>
	<div id="unique" class="ifOnlyIKnew">
		<span> Some example text 1 </span>
	</div>

	<div class="container">
		<span> Some example text 2 </span>
	</div>

	<div id="changevis" class="ifOnlyIKnew">
		<span> Some example text 3 </span>
	</div>

	 <button onclick="changecolor()"> Change color </button>

	 <button id="changevisibility"> Change Visibility </button>

	  <input id="input" type="text" name="colorchange">

	<button onclick="clicked()"> Click me! </button>
	<p>
		Hello World!
	</p>









	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
<script>
$("#changevisibility").click(function(){

	if ($("#changevis").css("display") == "none") {
		// alert("element is hidden: Showing now...")
		$("#changevis").fadeIn();
		// $("#changevis").css("visibility", "visible").hide().fadeIn("slow");;
	} else {
		// alert("element is visible: Hiding now...")
		// $("#changevis").css("visibility", "hidden").hide().fadeIn();

		// fadeOut sets display to "none" which is why I check for it above.
		$("#changevis").fadeOut();
	}

});
</script>
</html>
