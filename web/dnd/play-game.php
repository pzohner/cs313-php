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
    
</head>

<?php
$gamename = $_SESSION['gamename'];
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


    // foreach ($db->query('SELECT games.gamename, games.tableimgpath FROM games, dm where games.dmid = dm.id ') as $row)
    foreach ($db->query("SELECT gamename, tableimgpath FROM games where gamename = '$gamename'") as $row)
            
        {
            echo '<body id="gameboard" background="'. $row['tableimgpath'] . '">';
            echo '<h1>' . $row['gamename'] . '</h1>';
            }


    #print out each character onto the map
    foreach ($db->query('SELECT avatarname, imgpath FROM character') as $row)
            {

                echo '<img id="character" src="' . $row['imgpath'] . '">';

            }
    echo '</body>';
            
?>
<script>
    var gameboard = document.querySelector("#gameboard");
    var character = document.querySelector("#character");


    gameboard.addEventListener("click", getClickPosition, false);

    function getClickPosition(e) {
        alert(e.clientx);
        alert(e.clienty);
        var xPos = e.clientx;
        var yPos = e.clienty;

        var translate3dValue = "translate3d(" + xPos + "px, " + yPos + "px, 0)";

        character.style.transform = translate3dValue;
    }
</script>
</body>


</html>