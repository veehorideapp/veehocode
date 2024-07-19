<?php
try {

    $conn = new PDO("sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB", "Veeho_Admin", "Mikhael1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = isset($_POST['username']) ? $_POST['username'] : '';

$password = isset($_POST['password']) ? $_POST['password'] : '';
 
// This SQL statement selects ALL from the table 'Tariff'
$sql = "SELECT `Username`,`Password`,`Forename`,`Surname`,`UserType`,`EmailAddress`,`Registered`,`LoggedIn` FROM `Users` 
WHERE `Username`='$username'";

// Prepare and execute the SQL query
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

// Fetch the first matching user as an associative array
$user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $user;
//echo json_encode($user);

} catch (PDOException $e) {
// Handle database connection errors
echo "Database Error: " . $e->getMessage();
exit;
} finally {
// Close the database connection
$conn = null;
}





 // Check if there are results
//if ($result = mysqli_query($con, $sql))
//  {
//  $row=mysqli_fetch_object($result);
//  $hash = $row->Password;
//  $usertype = $row->UserType
//  $resultArray [] =$row;
 // echo $hash;
	
// if (password_verify($password, $hash))
// {
//if ($usertype ='DRIVER') {
// $sql1 = "SELECT `DriverNumber`,`DriverForename`,`DriverSurname`,`DocVerified` FROM `Driver` WHERE `DriverNumber` = '$username'";

// if ($result1 = mysqli_query($con, $sql1))
//{
	// $row1=mysqli_fetch_object($result1);
	 //$resultArray [] =$row1;
//}

//}

//} else {
  // $resultArray[] = 'Invalid password';
//}
//}


 
// Close connections
// mysqli_close($con);
?>
