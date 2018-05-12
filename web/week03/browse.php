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

  function addToCart(itemName, price) {
    // alert("Added to cart: " + itemName + ", " + price);
    $("#" + itemName).text("Added to Cart!");
    $("#" + itemName).css("background-color", "green");

     $.ajax({
            url: 'session.php',
            type: 'POST',
            // async: false,
            data: {
              itemName: itemName,
                price: price,
            }
    }).done(function(data){
            // alert(data);
    });
  }

function viewCart() {
  
}
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
     <span > VR Head Mounted Display (HMD) </span>
     <img src="../intro/images/oculus-touch.jpg" alt="picture of man wearing an oculus touch VR headset">
   </div>

   <span> $399 </span>

   <span> 0 </span>

   <button id="hmd" class="addToCart" type="button" onclick="addToCart('VR HMD', '399')" >Add to Cart</button>
 </div>

  <div class="item">
   <div class="namePic"> 
     <span > Extra Sensor </span>
     <img src="../intro/images/oculus-touch.jpg" alt="picture of man wearing an oculus touch VR headset">
   </div>

   <span> $60 </span>

   <span> 0 </span>

   <button id="sensor" class="addToCart" type="button" onclick="addToCart('Floor Sensor', '60')" >Add to Cart</button>
 </div>

  <div class="item">
   <div class="namePic"> 
     <span > Oculus Touch Controllers </span>
     <img src="../intro/images/oculus-touch.jpg" alt="picture of man wearing an oculus touch VR headset">
   </div>

   <span> $120 </span>

   <span> 0 </span>

   <button id="touchcontrollers" class="addToCart" type="button" onclick="addToCart('Touch Controllers', '120')" >Add to Cart</button>
 </div>




</div>

<button id="viewCartBtn" type="button" onClick="document.location.href='viewcart.php'"> View Cart </button>



</body>
</html>
