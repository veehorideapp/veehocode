<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB", "Veeho_Admin", "Mikhael1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $password = isset($_GET['Password']) ? $_GET['Password'] : '';
    $username = isset($_GET['Username']) ? $_GET['Username'] : '';
    $forename = isset($_GET['Forename']) ? $_GET['Forename'] : '';
    $surname = isset($_GET['Surname']) ? $_GET['Surname'] : '';
    $usertype = isset($_GET['userType']) ? $_GET['UserType'] : '';
    $userphoneno = isset($_GET['UserPhoneNo']) ? $_GET['UserPhoneNo'] : ''; 
    $regtype = isset($_GET['RegType']) ? $_GET['RegType'] : '';
    $verificationcode = isset($_GET['VerifCode']) ? $_GET['VerifCode'] : '';
    $email = isset($_GET['EmailAdress']) ? $_GET['EmailAddress'] : '';

    // Hash the password using bcrypt with automatically generated salt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    Echo password_hash;
    // SQL query to fetch user based on mobile number
    $sql = "INSERT INTO  users(username,email,password_hash,first_name,last_name,registration_date,last_login,is_active,role_id,user_type,mobile_number,verification_code) VALUES('$username','$email','$hashed_password','$forename','$surname',GETDATE(),GETDATE(),0,' ','RIDER','$userphoneno','$verificationcode')";

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':mobileNumber', $mobileNumber, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the first matching user as an associative array
  //  $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt) {
        echo "User Added";
    } else {
        echo "User Not Added";
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


