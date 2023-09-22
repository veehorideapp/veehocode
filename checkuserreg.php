<?php


// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB", "Veeho_Admin", "Mikhael1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mobileNumber = isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : '';


    // SQL query to fetch usernames
   
    $sql = "SELECT * FROM users WHERE username = :mobileNumber";


    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch all usernames as an associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result){

    echo "UserFound";

    } else {

    echo "NotFound";    

    } 

} catch (PDOException $e) {
    // Handle database connection errors
    echo "Database Error: " . $e->getMessage();
    exit;
}

// Close the database connection
    $pdo = null;

?>


