<?php

//mb_internal_encoding("UTF-8");
 
// Create connection
$ c o n   =   n e w   P D O ( " s q l s r v : s e r v e r   =   t c p : v e e h o d b s e r v e r . d a t a b a s e . w i n d o w s . n e t , 1 4 3 3 ;   D a t a b a s e   =   v e e h o _ D B " ,   " V e e h o _ A d m i n " ,   " M i k h a e l 1 ! " ) ; 
 
         $ c o n n - > s e t A t t r i b u t e ( P D O : : A T T R _ E R R M O D E ,   P D O : : E R R M O D E _ E X C E P T I O N ) ;   

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
// $sql1 = "SELECT `DriverNumber`,`DriverForename`,`DriverSurname`,`DocVerified` FROM `Driver` WHERE `DriverNumber` = '$username'";

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
