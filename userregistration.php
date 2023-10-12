<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB", "Veeho_Admin", "Mikhael1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $forename = isset($_POST['Forename']) ? $_POST['Forename'] : '';
    $surname = isset($_POST['Surname']) ? $_POST['Surname'] : '';
    $usertype = isset($_POST['userType']) ? $_POST['UserType'] : '';
    $userphoneno = isset($_POST['UserPhoneNo']) ? $_POST['UserPhoneNo'] : ''; 
    $regtype = isset($_POST['RegType']) ? $_POST['RegType'] : '';
    $verificationcode = isset($_POST['VerifCode']) ? $_POST['VerifCode'] : '';
    $email = isset($_POST['EmailAdress']) ? $_POST['EmailAddress'] : '';

    // Hash the password using bcrypt with automatically generated salt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to fetch user based on mobile number
    $sql = "INSERT INTO users(username,email,password_hash,first_name,last_name,registration_date,last_login,is_active,role_id,user_type,mobile_number,verification_code) VALUES('$username','$email','$hashed_password','$forename','$surname',GETDATE(),GETDATE(),0,' ','RIDER','$userphoneno','$verificationcode')";

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
   // $stmt->bindParam(':mobileNumber', $mobileNumber, PDO::PARAM_STR);
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


