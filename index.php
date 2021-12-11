<!DOCTYPE html>
<html lang = "en">
    <!-- Is like, having indentations here a bad thing? xd --> 
    <head>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Code saver</title>
    </head>

    <body>
        <div class = "code-entry">
            <form method = "POST" action="code_submit.php">
                <label for = "code-name">Name: </label>
                <input type = "text" id = "code-name" name = "code-name" required>
                <label for = "auth-password">Key: </label>
                <input type = "password" id = "auth-password" name = "auth-password" required><br><br><br>
                <label for = "code-content">Code: </label> <br>

                <!-- I'd like to thank the almighty stackoverflow -->
                <!-- We're giving it the ability to have intendations -->
                <textarea id = "code-content" name = "code-content" rows="50" cols="120" required
                    onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}">
                </textarea><br>

                <input type="submit" value="Save this code">
            </form>
        </div>

        <div class = "code-files">
            <?php
                include('database.php');

                $conn = dbconnect();
                $db_table = 'codes';

                if ($conn->connect_error){
                    die('db error...');
                }

                //Loads all the existing codes from the database
                $db_query = 'SELECT * FROM ' . $db_table;
                $query_result = $conn->query($db_query);

                if ($query_result->num_rows > 0){
                    while($row = $query_result->fetch_assoc()){
                        $id = $row['id'];
                        echo $id . ': ' . '<a href=code_view.php?code_id=' . $id . '>' . $row['name'] . '</a>' . '<br>';
                    }
                }

                $conn->close();
            ?>
        </div>

        <footer>
            <p>&copy; 2021</p>
        </footer>
    </body>
</html>