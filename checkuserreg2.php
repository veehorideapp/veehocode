<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB", "Veeho_Admin", "Mikhael1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mobileNumber = isset($_GET['mobileNumber']) ? $_GET['mobileNumber'] : '';

    // SQL query to fetch user based on mobile number
    $sql = "SELECT * FROM users WHERE username = :mobileNumber";

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':mobileNumber', $mobileNumber, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the first matching user as an associative array
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "UserFound";
    } else {
        echo "NotFound";
    }
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Database Error: " . $e->getMessage();
    exit;
} finally {
    // Close the database connection
    $conn = null;
}
?>


