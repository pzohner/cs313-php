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
    <form id='login' action="login.php" method='post'> 
        <span> Please log in </span> 
        Username: <input type="text" name='username' value='porter'>
        Password: <input type="password" name = 'password' value='dndrocks'>

    <button id="loginbutton" type="submit"> Login </button>
        
    </form>

<?php
    session_start();


    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];

    

    $dbUrl = getenv('DATABASE_URL');
        
    $dboptions = parse_url($dbUrl);

    $user = $dboptions['user'];
    $password = $dboptions['pass'];

        $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Database connection successful';
        
    
        // $stmt = $db->prepare('SELECT username, password FROM users');

        foreach ($db->query('SELECT username, password FROM users') as $row)
        {
            if ($usernameInput == $row['username'] && $passwordInput == $row['password']) {
                echo 'login successful';
                $_SESSION["currentUser"] = $usernameInput;

                header("Location: selection-page.php");
            }
        }


    // echo "    <form id='login' action='login.php'> ";
    // echo "        <span> Please log in </span> ";
    // echo "        Username: <input type='text'>";
    // echo "        Password: <input type='text'>";

    // echo "    <button id='loginbutton' type='submit'> Login </button>";
            
    // echo "    </form>";
?>
    <button type="button" onclick="window.location.href='selection-page.php'"> Skip login (will be removed later) </button>

</body>
</html>