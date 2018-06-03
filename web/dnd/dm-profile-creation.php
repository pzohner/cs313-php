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
    <form id='dm-profile-creation' action='dm-profile-creation.php' method='post'> 
        <span> Enter a name to create your DM Profile. You must have a DM profile to create a game. </span> <br>
        DM name: <input type="text" name='dmname'>

    <button id="dmProfileCreationComplete" type="submit" name='submit' > Finish </button>
    <!-- onclick="window.location.href='selection-page.php'" -->
    </form>

<?php 
    echo 'php running<br>';
    $currentUser = $_SESSION["currentUser"];
    
    $dmname = $_POST['dmname'];

    $dbUrl = getenv('DATABASE_URL');
    $dboptions = parse_url($dbUrl);

    $user = $dboptions['user'];
    $password = $dboptions['pass'];

        $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Database connection successful<br>';

        foreach ($db->query('SELECT username FROM users') as $row) {
            if ($row['username'] == $currentUser) {
                echo 'Found the correct user<br>';

                $stmt = $db->prepare('INSERT INTO dm (dmname, userid)
                VALUES (:dmname, :userid);');
                $stmt->bindValue(':dmname', $dmname);
                $stmt->bindValue(':userid', $row['id']);
                if (!$stmt) {
                    echo "stmt not set";
                }
                $stmt->execute();
                echo 'inserted dm profile into database<br>';
                
            }
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