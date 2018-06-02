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
                                                                                <!-- specifies what type of data to use -->
    <form id='character-creation' action='character-creation.php' method='post' enctype="multipart/form-data" > 
        <span> Choose a name and upload an image to create your character! </span> 
        Character name: <input type="text" name='avatarname'>
        Upload an image: <input type="file" name='characterpic'>

    <button id="createCharacterComplete" type="submit" name="submit" > Finish </button>
    <!-- onclick="window.location.href='selection-page.php'" -->
    </form>


    <?php
////////////////////////////
ini_set('file_uploads', 'on');

$target_dir = "dnd/images/";
$target_file = $target_dir . basename($_FILES["characterpic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["characterpic"]["tmp_name"]);
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
if ($_FILES["characterpic"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["characterpic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["characterpic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


///////////////////////////

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
                $stmt->bindValue(':imgpath', $target_file);
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