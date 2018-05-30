<?php
if (isset($_POST['scriptureSubmit'])) {
        echo 'scriptureSubmit was set!';
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
            
            $db->query("INSERT INTO scriptures (book, chapter, verse, content) VALUES ('".$_POST["book"]."','".$_POST["chapter"]."','".$_POST["verse"]."','".$_POST["content"]."')");
            echo 'INSERT WORKED!';
            // (\'$_POST['book']\', $_POST['chapter'], $_POST['verse'], \'$_POST['content']\')")
    }
?>