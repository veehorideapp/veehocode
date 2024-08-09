<?php
header('Content-Type: application/json');

try {

    $conn = new PDO("sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB", "Veeho_Admin", "Mikhael1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

$username = isset($_POST['username']) ? $_POST['username'] : '';

$password = isset($_POST['password']) ? $_POST['password'] : '';
 
// This SQL statement selects ALL from the table 'Users'
    
    $sql1 = "SELECT username, email, first_name, last_name,registration_date,last_login,is_active,user_type,mobile_number,password_hash
    FROM users
    WHERE Username=:username";

// Prepare and execute the SQL query
$stmt = $conn->prepare($sql1);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

// Fetch the first matching user as an associative array
$user = $stmt->fetch(PDO::FETCH_ASSOC);
    
if ($user) {
    $hash=$row("password_hash");
    if(password_verify($password,$hash)) {
    echo json_encode($user);
       } else {
       echo json_encode(array("error" => "Invalid Password"));
       }
       
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
