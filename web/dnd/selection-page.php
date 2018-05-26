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


    $(document).ready(function () {
        // Disable create game button until they have selected a DM profile
        $("#game-creation-btn").attr("disabled", "disabled");

    })

function isDMSelected() {
    var dmradio = document.getElementsByClassName("dmradio");

    for(var i = 0; i < dmradio.length; i++) {
        if (dmradio[i].checked) {
            document.getElementById("game-creation-btn").disabled = false;
        }
    }
}

function isCharacterSelected() {
    var characterradio = document.getElementsByClassName("characterradio");

    for(var i = 0; i < characterradio.length; i++) {
        if (characterradio[i].checked) {
            document.getElementById("game-creation-btn").disabled = true;
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


            echo '<div id="playerordm">';
            # DM SELECTION
            echo '<div id="dm-selection">';
            echo '<span> Choose a Dungeon Masters Profile...<br>';
            
            foreach ($db->query('SELECT dmname, gamename, tableimgpath FROM dm') as $row)
            {
                #Print out all DM profiles from the database
                echo '<input type="radio" name="player-selection" class="dmradio" onclick="isDMSelected()"> ' . $row['dmname'] . ' with game named ' . $row['gamename'] . ' with game board image at ' . $row['tableimgpath']. '<br/>';
                
            }
            echo ' <button id="dm-creation-btn" type="button" onclick="window.location.href=\'dm-profile-creation.php\'"> Create new DM Profile </button><br>';
            echo ' <button id="game-creation-btn" type="button" onclick="window.location.href=\'game-creation.php\'"> Create a new Game </button><br>';
            echo '</div>';

            echo 'OR...';

            # PLAYER SELECTION
            echo '<div id="character-selection">';
            echo '<span> Choose a character...<br>';
            foreach ($db->query('SELECT avatarname, imgpath FROM character') as $row)
            {
                #print out all characters from the database
                echo '<input type="radio" name="player-selection" class="characterradio" onclick="isCharacterSelected()"> ' . $row['avatarname'] . ' ' . '<img src="'. $row['imgpath'] .'">' . '<br/>';
            }
            echo '<button id="createCharacterButton" type="button" onclick="window.location.href=\'character-creation.php\'"> Create a new Character </button><br>';
            echo '</div>';
            echo '</div>';


            # GAME SELECTION
            echo '<div id="game-selection">';
            echo '<span> Choose a game to join...<br>';
            foreach ($db->query('SELECT games.gamename, dm.dmname FROM games, dm where games.dmid = dm.id ') as $row)
            {
                #print out all characters from the database
                echo '<input type="radio" name="games-selection-btn" class="gamesradio" onclick="isCharacterSelected()"> ' . $row['gamename'] . ' hosted by DM ' . $row['dmname']. '<br/>';
            }
            echo '<button id="enterGame" type="button"> Enter Game </button><br>';

            echo '</div>';
            
        ?>
        
    </div>

</body>

</html>