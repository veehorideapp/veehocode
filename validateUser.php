<?php
try{
//mb_internal_encoding("UTF-8");
 
// Create connection
$ c o n   =   n e w   P D O ( " s q l s r v : s e r v e r   =   t c p : v e e h o d b s e r v e r . d a t a b a s e . w i n d o w s . n e t , 1 4 3 3 ;   D a t a b a s e   =   v e e h o _ D B " ,   " V e e h o _ A d m i n " ,   " M i k h a e l 1 ! " ) ; 
 
         $ c o n - > s e t A t t r i b u t e ( P D O : : A T T R _ E R R M O D E ,   P D O : : E R R M O D E _ E X C E P T I O N ) ;   

$username = isset($_POST['username']) ? $_POST['username'] : '';

$password = isset($_POST['password']) ? $_POST['password'] : '';
 
// This SQL statement selects ALL from the table 'Tariff'
$sql = "SELECT `Username`,`Password`,`Forename`,`Surname`,`UserType`,`EmailAddress`,`Registered`,`LoggedIn` FROM `Users` 
WHERE `Username`='$username'";

// Prepare and execute the SQL query
$stmt = $con->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

// Fetch the first matching user as an associative array
$user = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($user);

} catch (PDOException $e) {
// Handle database connection errors
echo "Database Error: " . $e->getMessage();
exit;
} finally {
// Close the database connection
$con = null;
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
