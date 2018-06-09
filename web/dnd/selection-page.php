<!DOCTYPE html>
<?php
session_start();
?>
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
        var dmname1 = dmradio[i].value;
        document.getElementById("game-creation-btn").disabled = false;

        var data = {
            dmname: dmname1
        };

        $.post("set_dm_id.php", data);
    }


    }
}

function isCharacterSelected() {
    var characterradio = document.getElementsByClassName("characterradio");

    for(var i = 0; i < characterradio.length; i++) {
        if (characterradio[i].checked) {
            // if player selects a character, disable game-creation button (only available to DMs)
            document.getElementById("game-creation-btn").disabled = true;
            var characterradio1 = characterradio[i].value;

            var data = {
                character: characterradio1
            };

            $.post("set_character.php", data);
        }
    }
}

function isGameSelected() {
    var gamesradio = document.getElementsByClassName("gamesradio");

    for(var i = 0; i < gamesradio.length; i++) {
        if (gamesradio[i].checked) {
            var gamesradio1 = gamesradio[i].value;

            var data = {
                gamename: gamesradio1
            };

            $.post("set_gamename.php", data);
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
        
            # PLAYER SELECTION
            echo '<div id="character-selection">';
            echo '<h5> Choose a character...<br>';

            foreach ($db->query('SELECT id, username from users') as $users) {
                if ($users['username'] == $_SESSION["currentUser"]) {
                    $id = $users['id'];
                    foreach ($db->query("SELECT userid, avatarname, imgpath FROM character where userid = '$id'") as $row)
                        {
                            #print out all characters from the database
                            echo '<input type="radio" name="player-selection" class="characterradio" onclick="isCharacterSelected()" value="'.$row['avatarname'].'">' . $row['avatarname'] . ' ' . '<img src="'. $row['imgpath'] .'">' . '<br/>';
                        }
                }
            }
            
            echo '<button id="createCharacterButton" type="button" onclick="window.location.href=\'character-creation.php\'"> Create a new Character </button><br>';
            echo '</div>';

            echo 'OR...';

            # DM SELECTION
            echo '<div id="dm-selection">';
            echo '<span> Choose a Dungeon Masters Profile...<br>';

            foreach ($db->query('SELECT dmname FROM dm') as $row)
            {
                #Print out all DM profiles from the database
                echo '<input type="radio" name="player-selection" class="dmradio" onclick="isDMSelected()" value='.$row['dmname'].'>' . $row['dmname'] . '<br/>';
                
            }
            echo ' <button id="dm-creation-btn" type="button" onclick="window.location.href=\'dm-profile-creation.php\'"> Create new DM Profile </button><br>';
            echo ' <button id="game-creation-btn" type="button" onclick="window.location.href=\'game-creation.php\'"> Create a new Game </button><br>';
            echo '</div>';
            echo '</div>';
            

            # GAME SELECTION
            echo '<div id="game-selection">';
            echo '<span> Choose a game to join...<br>';
            foreach ($db->query('SELECT gamename, tableimgpath FROM games') as $row)
            {
                #Games available
                echo '<input type="radio" name="games-selection-btn" class="gamesradio" onclick="isGameSelected()" value='.$row['gamename'].'>' . $row['gamename'] . '<br/>';
            }
            echo '<button id="enterGame" type="button" onclick="window.location.href=\'play-game.php\'"> Enter Game </button><br>';

            echo '</div>';
            
        ?>
        
    </div>

</body>

</html>