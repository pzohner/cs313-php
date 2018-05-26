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
    <script>


    // $(document).ready(function () {
    //     document.getElementById("rdbSelect").click()

    // })
function isDMSelected() {
    var dmradio = document.getElementsByClassName("dmradio");

    for each (var dm in dmradio) {
        if (if dm.checked) {
            document.getElementById("enterGame").disabled = true;
        }

    }
}
</script>
</head>
<body>
    <div id='selection'> 
        <span> Select the DM or character you wish to use to play or create a new one! </span> 

        <?php
            try {
            $dbUrl = getenv('DATABASE_URL');

            $dboptions = parse_url($dbUrl);

            $user = $dboptions['user'];
            $password = $dboptions['pass'];

                $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
            } catch (PDOEXCEPTION $ex)
            {
                echo 'Error!: ' . $ex->getMessage();
                die();
            }

            foreach ($db->query('SELECT avatarname, imgpath FROM character') as $row)
            {
                echo '<input type="radio" name="player-selection" class="characterradio" > ' . $row['avatarname'] . ' with image at ' . $row['imgpath']. '<br/>';
                
            }
            echo '<button id="character-creation" type="button"> Create a new Character </button><br>';


            foreach ($db->query('SELECT dmname, gamename, tableimgpath FROM dm') as $row)
            {
                echo '<input type="radio" name="player-selection" class="dmradio" onclick="isDMSelected()"> ' . $row['dmname'] . ' with game named ' . $row['gamename'] . ' with game board image at ' . $row['tableimgpath']. '<br/>';
                
            }
        echo ' <button id="dm-creation" type="button"> Create new DM Profile </button><br>';

        ?>
        

        <button id="enterGame" type="button"> Enter Game </button>
        
    </div>

</body>

</html>