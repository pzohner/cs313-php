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
    <form id='game-creation' action="game-creation.php" method='post' enctype="multipart/form-data"> 
        <span> Please select a game name, and an img to upload as the background. </span> 
        Game name: <input type="text" name="gamename">
        Upload an tabletop image: <input type="file" name='tableimg'>

    <button id="gameCreationComplete" type="submit" name="submit" > Finish </button>
    <!-- onclick="window.location.href='selection-page.php'" -->
    </form>
    <?php
////////////////////////////
// Needed in order for php to accept file uploads!
// ini_set('file_uploads', 'on');

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["tableimg"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["tableimg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["tableimg"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["tableimg"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["tableimg"]["name"]). " has been uploaded.";
        print_r($_FILES);
    } else {
        echo "Sorry, there was an error uploading your file.";
        print_r($_FILES);
    }
}


///////////////////////////

    $currentUser = $_SESSION["currentUser"];
    $tableimg = $_POST['tableimg'];
    $gamename = $_POST['gamename'];

    $dbUrl = getenv('DATABASE_URL');
            
    $dboptions = parse_url($dbUrl);

    $user = $dboptions['user'];
    $password = $dboptions['pass'];

        $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Database connection successful';

        // make sure the user that we want this character to be associated with is in the database
        foreach ($db->query('SELECT id, username FROM users') as $row) {
            if ($row['username'] == $currentUser) {
                echo 'Found the correct user';

                $stmt = $db->prepare('INSERT INTO games (gamename, tableimgpath)
                VALUES (:gamename, :tableimgpath);');
                $stmt->bindValue(':gamename', $gamename);
                $stmt->bindValue(':tableimgpath', $target_file);
                if (!$stmt) {
                    echo "stmt not set";
                }
                $stmt->execute();
                echo 'inserted game into database';
                
            }
        }
        // $setuserstmt = $db->query('SELECT username from users u INNER JOIN character c where c.userid = u.id');

        

?>
</body>
</html>