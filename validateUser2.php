<?php
header('Content-Type: application/json');
echo "starting User Validate";
try {

    $conn = new PDO("sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB", "Veeho_Admin", "Mikhael1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

$username = $_GET['username'];

$password = $_GET['password'];
 echo $username;
// This SQL statement selects ALL from the table 'Tariff'
$sql = "SELECT 'Username','Password','Forename','Surname','UserType','EmailAddress','Registered','LoggedIn' FROM users
WHERE 'Username'=:username";

    $sql1 = "SELECT * FROM users
    WHERE Username=:username";
    
// Prepare and execute the SQL query
$stmt = $conn->prepare($sql1);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

// Fetch the first matching user as an associative array
$user = $stmt->fetch(PDO::FETCH_ASSOC);
    
if ($user) {
echo json_encode($user);
    }   else {
         echo json_encode(array("error" => "0 results"));
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
