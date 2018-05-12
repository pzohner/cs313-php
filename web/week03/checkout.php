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

function deleteItems() {
    $('input[type=checkbox]').each(function () {
        if (this.checked) {
            this.nextSibling.textContent = "";
            $(this).remove();
            // alert("Item " + $(this).val() + "has been checked: " + this.checked);
        }
        // sList += "(" + $(this).val() + "-" + (this.checked ? "checked" : "not checked") + ")";
    });
}
</script>
</head>

<body id="viewcart">
   
<h1> Please fill in the following information so we can bill you appropriately. </h1>
    <div id="addressInfo"> 
    Please enter your address: <br> <input type='text' name='address' value=''>
    State:  <br> <input type='text' name='address' value=''>
    Country <br> <input type='text' name='address' value=''>
    Zip code <br> <input type='text' name='address' value=''>
    </div>

<button id="checkout" type="button" onClick="document.location.href='confirmation.php'"> Checkout </button>


</body>
</html>
