<?php
echo 'page is working';

        $book = $_POST['book'];
        $chapter = $_POST['chapter'];
        $verse = $_POST['verse'];
        $content = $_POST['content'];
        $scriptTopics = $_POST['scriptopic'];
     

        echo "$book";
        echo "$chapter";
        echo "$verse";
        echo "$content";


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
            
                
                $stmt = $db->prepare('INSERT INTO scriptures (id, book, chapter, verse, content)
                VALUES (:book, :chapter, :verse, :content);');
                $stmt->bindValue(':book', $book);
                $stmt->bindValue(':chapter', $chapter);
                $stmt->bindValue(':verse', $verse);
                $stmt->bindValue(':content', $content);
                if (!$stmt) {
                    echo "stmt not set";
                }
                $stmt->execute();



                // // get the new id
                // $scriptureId = $db->lastInsertId("scripture_id_seq");
                // // Now go through each topic id in the list from the user's checkboxes
                // foreach ($topicIds as $topicId)
                // {
                //     echo "ScriptureId: $scriptureId, topicId: $topicId";
                //     // Again, first prepare the statement
                //     $statement = $db->prepare('INSERT INTO topicscripturelink(scriptureId, topicId) VALUES(:scriptureId, :topicId)');
                //     // Then, bind the values
                //     $statement->bindValue(':scriptureId', $scriptureId);
                //     $statement->bindValue(':topicId', $topicId);
                //     $statement->execute();
                // }



                // $topicID = 0;
                // // foreach ($scriptTopics as $scriptTopic) {
                // //     echo "ScriptureId: $scriptureId, topicId: $topicId";
                // // }

                // $stmt = $db->prepare('INSERT INTO scriptopic (topicID, scriptureID)
                // VALUES (:topicID, scriptureID);');
                // $stmt->bindValue(':scriptureID', $scriptureID);
                // $stmt->bindValue(':topicID', $topicID);
                // if (!$stmt) {
                //     echo "stmt not set";
                // }
                // $stmt->execute();
            
            
            // $db->query("INSERT INTO scriptures (book, chapter, verse, content) VALUES ('".$_POST["book"]."','".$_POST["chapter"]."','".$_POST["verse"]."','".$_POST["content"]."')");
            echo 'INSERT WORKED!';
            // (\'$_POST['book']\', $_POST['chapter'], $_POST['verse'], \'$_POST['content']\')")
?>