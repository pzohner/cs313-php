
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Assign03 - Checkout </title>

  <!-- Including bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
	 crossorigin="anonymous">

	<!-- Including my personal styles -->
  <link href="styles.css" rel="stylesheet" type="text/css">
  
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>

</script>
</head>

<?php
session_start();

echo "<h3> Congratulations! You have bought the following items... </h3>";
// <input type="checkbox" name="vehicle" value="Bike"> I have a bike<br>


function showcart() {
    echo "<div id='confirmation'>";
    foreach($_SESSION as $key => $value){
        $originalkey = $key;
        if ($key == "hmd") {
            $key = "Virtual Reality Head Mounted Display (HMD)";
        } elseif ($key == "touchcontrollers") {
            $key = "Oculus Touch Controllers";
        } elseif ($key == "sensor") {
            $key = "Floor sensor";
        }

        echo "<span> htmlspecialchars($key) for $htmlspecialchars($value).00</span><br>";
        // unset($_SESSION['Products']);
    }
    echo "<\div>";
}

showcart();
?>

</body>
</html>

