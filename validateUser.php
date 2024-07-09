<?php

//mb_internal_encoding("UTF-8");
 
// Create connection
$con=mysqli_connect("localhost","u369276934_ash1","Ehsana1","u369276934_vhodb");

$username = $_POST['username'];
mysqli_real_escape_string($con,$_POST['username']) ;

$password = $_POST['password'];
mysqli_real_escape_string($con,$_POST['password']) ;

 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// This SQL statement selects ALL from the table 'Tariff'
$sql = "SELECT `Username`,`Password`,`Forename`,`Surname`,`UserType`,`EmailAddress`,`Registered`,`LoggedIn` FROM `Users` 
WHERE `Username`='$username'";

 // Check if there are results
if ($result = mysqli_query($con, $sql))
{
  $row=mysqli_fetch_object($result);
  $hash = $row->Password;
  $usertype = $row->UserType
  $resultArray [] =$row;
 // echo $hash;
	
if (password_verify($password, $hash))
{
//if ($usertype ='DRIVER') {
$sql1 = "SELECT `DriverNumber`,`DriverForename`,`DriverSurname`,`DocVerified` FROM `Driver` WHERE `DriverNumber` = '$username'";

if ($result1 = mysqli_query($con, $sql1))
{
	 $row1=mysqli_fetch_object($result1);
	 $resultArray [] =$row1;
}

//}

} else {
   $resultArray[] = 'Invalid password';
}
}

echo json_encode($resultArray );
 
// Close connections
mysqli_close($con);
?>