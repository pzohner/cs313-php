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

  function addToCart(itemName, data) {
    alert("Added to cart: " + itemName + ", " + data);

     $.ajax({
            url: 'browse.php',
            type: 'POST',
            data: {
              itemName: itemName,
                data: data,
            }
            
    // $.post("browse.php", {"itemName": itemName, "data" : data}, success: function () {alert("ajax call completed");
    
    }).done(function(data){
            alert(data);
            <?php 
            session_start();
            $name = $_SESSION["name"];
            echo "alert(\"The item is: "."$name"."\");";
            ?>
    });
    <?php
      session_start();
      $itemName = $_POST["itemName"];
      $_SESSION["name"] = $_POST["data"];
      echo $_SESSION["name"];
      // echo "alert(\"THe item is: "."$itemName"."\");";
    ?>
  }

// $(document).ready(function(){

// $('.addToCart').click(function(itemName, data){

//     });

//     $('.addToCart').click(function(){
//       $.ajax({ 
//         url: 'browse.php', 
//         success: function(data) {
//                 alert("Data returned: " + data);
//             }});
//       // $.get('browse.php', function(data) {
//       //           alert("Server Returned: " + data);
//       //       });
//         // var clickBtnValue = $(this).val();
//         // var ajaxurl = 'ajax.php',
//         // data =  {'action': clickBtnValue};
//         // $.post(ajaxurl, data, function (response) {
//         //     // Response div goes here.
//         //     alert("action performed successfully");
//         // });
//     });

// });
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

   <button class="addToCart" type="button" onclick="addToCart('hmd', '399')" >Add to Cart</button>
 </div>

  <!-- <div class="item">
   <div class="namePic"> 
     <span > VR Headset </span>
     <img src="../intro/images/oculus-touch.jpg" alt="picture of man wearing an oculus touch VR headset">
   </div>

   <span value="399"> $399 </span>

   <span> 0 </span>

   <button class="addToCart" type="button" onclick="addToCart('hmd')" >Add to Cart</button>
 </div> -->




</div>


<?php
print_r($_SESSION);
?>



</body>
</html>
