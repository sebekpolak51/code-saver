<?php
    include('database.php');

    $pass = 5859; // This is what the user needs to provide in order to access the database.
    $_DEBUG = false;

    $code_name = $_POST['code-name'];
    $auth_key = $_POST["auth-password"];
    $code_content = $_POST['code-content'];

    if (!isset($code_content, $auth_key, $code_content)){
        die(' ● Not enough information provided.');
    }

    if ($auth_key != $pass){
        die(' ● Password failed.');
    }

    // Now, let's compress the code so the database doesn't give any errors regarding query's syntax
    $code_compressed = base64_encode($code_content);

    // Saves the code to the database
    $conn = dbconnect();
    $db_table = 'codes';

    if ($conn->connect_error){
        die(' ● Couldn\'t connect to the database.');
    }

    echo ' ● Established database connection...';

    $db_query = 'INSERT INTO ' . $db_table . '(name, code) VALUES ("' . $code_name . '", "' . $code_compressed . '");';
    if ($_DEBUG){
        echo 'Query: ' . $db_query . '<br><br>';
    }
    if ($conn->query($db_query) === TRUE){
        echo ' ● Query succeeded.';
    }
    else{
        echo ' ● Query failed!';
    }

    $conn->close();
    echo ' ● Closed the connection.';
?>