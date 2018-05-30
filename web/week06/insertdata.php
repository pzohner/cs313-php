<?php
echo 'page is working';
if (isset($_POST['scriptureSubmit'])) {
        echo 'scriptureSubmit was set!';

        $book = $_POST['book'];
        $chapter = $_POST['chapter'];
        $verse = $_POST['verse'];
        $content = $_POST['content'];
        
        try {
            $dbUrl = getenv('DATABASE_URL');
        
            $dboptions = parse_url($dbUrl);
        
            $user = $dboptions['user'];
            $password = $dboptions['pass'];
        
                $db = new PDO('pgsql:host=ec2-54-235-109-37.compute-1.amazonaws.com;port=5432;dbname=de9dr91rnaase1', $user, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOEXCEPTION $ex)
            {
                echo 'Error!: ' . $ex->getMessage();
                die();
            }
            
            $stmt = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content
            VALUES (:book, :chapter, :verse, :content)');
            $stmt->bindValue(':book', $book);
            $stmt->bindValue(':chapter', $chapter);
            $stmt->bindValue(':verse', $verse);
            $stmt->bindValue(':content', $content);
            $stmt->execute();
            // $db->query("INSERT INTO scriptures (book, chapter, verse, content) VALUES ('".$_POST["book"]."','".$_POST["chapter"]."','".$_POST["verse"]."','".$_POST["content"]."')");
            echo 'INSERT WORKED!';
            // (\'$_POST['book']\', $_POST['chapter'], $_POST['verse'], \'$_POST['content']\')")
    }
?>