<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Teach03 </title>
  

  <!-- Including bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
	 crossorigin="anonymous">

	<!-- Including my personal styles -->
  <link href="styles.css" rel="stylesheet" type="text/css">
  
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>

function deleteItems() {
    $('input[type=checkbox]').each(function () {
        if (this.checked) {
            $(this).remove();
            // alert("Item " + $(this).val() + "has been checked: " + this.checked);
        }
        // sList += "(" + $(this).val() + "-" + (this.checked ? "checked" : "not checked") + ")";
    });
}
</script>
</head>

<body id="viewcart">
   

<?php
session_start();

echo "<h1> Items in your cart... </h1>";
// <input type="checkbox" name="vehicle" value="Bike"> I have a bike<br>
function showcart() {
    foreach($_SESSION as $key => $value){
        $originalkey = $key;
        if ($key == "hmd") {
            $key = "Virtual Reality Head Mounted Display (HMD)";
        } elseif ($key == "touchcontrollers") {
            $key = "Oculus Touch Controllers";
        } elseif ($key == "sensor") {
            $key = "Floor sensor";
        }
        echo "<input type='checkbox' name='cartitem' value='$originalkey'> $key for $$value.00<br>";
        // unset($_SESSION['Products']);
    }
}

showcart();
?>
<button id="deleteSelected" type="button" onClick="deleteItems()"> Delete Items </button>
<button id="backToBrowse" type="button" onClick="document.location.href='browse.php'"> Back to browse </button>
<button id="checkout" type="button" onClick="document.location.href='checkout.php'"> Checkout </button>


</body>
</html>
