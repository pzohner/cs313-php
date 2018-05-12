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

$(document).ready(function(){
    $('.addToCart').click(function(){
      $.ajax({ 
        url: 'browse.php' 
        success: function(data) {
                alert("Data returned: " + data);
            }});
      // $.get('browse.php', function(data) {
      //           alert("Server Returned: " + data);
      //       });
        // var clickBtnValue = $(this).val();
        // var ajaxurl = 'ajax.php',
        // data =  {'action': clickBtnValue};
        // $.post(ajaxurl, data, function (response) {
        //     // Response div goes here.
        //     alert("action performed successfully");
        // });
    });

});
// <script src="intro/scripts.js"></script>  
</script>
</head>

<body>
<div id="listofitems">
  <div class="item">
      <span > Name </span>
    
      <span> Price: </span>
    
      <span> Quantity: </span>

      <span> </span>
    </div>

 <div class="item">
   <div class="namePic"> 
     <span > VR Headset </span>
     <img src="../intro/images/oculus-touch.jpg" alt="picture of man wearing an oculus touch VR headset">
   </div>

   <span value="399"> $399 </span>

   <span> 0 </span>

   <button class="addToCart" type="button" >Add to Cart</button>
 </div>




</div>


<?php

?>



</body>
</html>
