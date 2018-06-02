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
<body>

    <form id='character-creation' action='character-creation.php' method='post'> 
        <span> Choose a name and upload an image to create your character! </span> 
        Character name: <input type="text" name='avatarname'>
        Upload an image: <input type="file">

    <button id="createCharacterComplete" type="submit" > Finish </button>
    <!-- onclick="window.location.href='selection-page.php'" -->
    </form>


    <?php


    $currentUser = $_SESSION["currentUser"];
    $avatarName = $_POST['avatarname'];

    $dbUrl = getenv('DATABASE_URL');
            
    $dboptions = parse_url($dbUrl);

    $user = $dboptions['user'];
    $password = $dboptions['pass'];

        $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Database connection successful';

        // make sure the user that we want this character to be associated with is in the database
        foreach ($db->query('SELECT username, password FROM users') as $row) {
            if ($row['username'] == $currentUser) {
                echo 'Found the correct user';

                $stmt = $db->prepare('INSERT INTO character (avatarname, posx, posy, imgpath, userid)
                VALUES (:avatarname, :posx, :posy, :imgpath, :userid);');
                $stmt->bindValue(':avatarname', $avatarName);
                $stmt->bindValue(':posx', 0);
                $stmt->bindValue(':posy', 0);
                $stmt->bindValue(':imgpath', "/examplepath");
                $stmt->bindValue(':userid', $row['id']);
                if (!$stmt) {
                    echo "stmt not set";
                }
                $stmt->execute();
                echo 'inserted character into database';
                
            }
        }
        // $setuserstmt = $db->query('SELECT username from users u INNER JOIN character c where c.userid = u.id');

        

?>

</body>
</html>