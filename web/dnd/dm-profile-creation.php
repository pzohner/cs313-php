<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

	<!-- <script src="intro/scripts.js"></script> -->

	<!-- Including bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
	 crossorigin="anonymous">

	<!-- Including my personal styles -->
    <link href="styles.css" rel="stylesheet" type="text/css">
    
</head>
<body>
    <div id='dm-profile-creation'> 
        <span> Enter a name to create your DM Profile. You must have a DM profile to create a game. </span> <br>
        DM name: <input type="text">

    <button id="dmProfileCreationComplete" type="button" onclick="window.location.href='selection-page.php'"> Finish </button>
        
    </div>

<!-- USEFUL WHEN TRYING TO CALL YOURSELF TO EXECUTE PHP
<#?php 
    if(isset($_POST['submit'])){ 
         //code to be executed
    }else{
         //code to be executed  
    }
?>
<html>
<head></head>
<body>
     <form method="post" action="">
        <input type="submit" name="submit">
     </form>
</body>
</html>
-->

</body>
</html>