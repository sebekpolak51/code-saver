<?php
    include('database.php');

    // As the code can't be transfered via link i have to read the content here
    $db_table = 'codes';

    $conn = dbconnect();

    $db_query = 'SELECT code FROM ' . $db_table . ' WHERE id = ' . $_GET['code_id'];
    $query_result = $conn->query($db_query);

    $row = $query_result->fetch_assoc();

    echo htmlspecialchars(base64_decode($row['code']));

    $conn->close();
?>