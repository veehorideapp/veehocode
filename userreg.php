{\rtf1\ansi\ansicpg1252\cocoartf2759
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fnil\fcharset0 Menlo-Bold;\f1\fnil\fcharset0 Menlo-Regular;}
{\colortbl;\red255\green255\blue255;\red155\green35\blue147;\red255\green255\blue255;\red0\green0\blue0;
\red196\green26\blue22;\red93\green108\blue121;}
{\*\expandedcolortbl;;\csgenericrgb\c60759\c13753\c57628;\csgenericrgb\c100000\c100000\c100000;\csgenericrgb\c0\c0\c0\c85000;
\csgenericrgb\c77000\c10200\c8600;\csgenericrgb\c36526\c42188\c47515;}
\paperw11900\paperh16840\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\deftab593
\pard\tx593\pardeftab593\partightenfactor0

\f0\b\fs24 \cf2 \cb3 <?php
\f1\b0 \cf4 \
try \{\
    $conn = 
\f0\b \cf2 new
\f1\b0 \cf4  PDO(\cf5 "sqlsrv:server = tcp:veehodbserver.database.windows.net,1433; Database = veeho_DB"\cf4 , \cf5 "Veeho_Admin"\cf4 , \cf5 "Mikhael1!"\cf4 );\
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);\
\
   \cf6 // $password= $_GET['Password']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['Password']) ;\cf4 \
   \cf6 // $username= $_GET['Username']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['Username']) ;\cf4 \
   \cf6 // $forename= $_GET['Forename']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['Forename']) ;\cf4 \
   \cf6 // $surname= $_GET['Surname']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['Surname']) ;\cf4 \
   \cf6 // $usertype= $_GET['userType']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['UserType']) ;\cf4 \
   \cf6 // $userphoneno= $_GET['UserPhoneNo']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['UserPhoneNo']) ;\cf4 \
   \cf6 // $regtype= $_GET['RegType']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['RegType']) ;\cf4 \
   \cf6 // $verificationcode= $_GET['VerifCode']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['VerifCode']) ;\cf4 \
   \cf6 // $email= $_GET['EmailAddress']\cf4 \
   \cf6 // mysqli_real_escape_string($con,$_GET['EmailAddress']) ;\cf4 \
\
    $password = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 'Password'\cf4 ]) ? $_POST[\cf5 'Password'\cf4 ] : \cf5 ''\cf4 ;\
    $username = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 'Username'\cf4 ]) ? $_POST[\cf5 'Username'\cf4 ] : \cf5 ''\cf4 ;\
    $forename = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 'Forename'\cf4 ]) ? $_POST[\cf5 'Forename'\cf4 ] : \cf5 ''\cf4 ;\
    $surname = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 '$surname'\cf4 ]) ? $_POST[\cf5 'Surname'\cf4 ] : \cf5 ''\cf4 ;\
    $usertype = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 'userType'\cf4 ]) ? $_POST[\cf5 'UserType'\cf4 ] : \cf5 ''\cf4 ;\
    $userphoneno = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 'UserPhoneNo'\cf4 ]) ? $_POST[\cf5 'UserPhoneNo'\cf4 ] : \cf5 ''\cf4 ;\
    $regtype = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 'RegType'\cf4 ]) ? $_POST[\cf5 'RegType'\cf4 ] : \cf5 ''\cf4 ;\
    $verificationcode = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 '\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7\'a7'\cf4 ]) ? $_POST[\cf5 'VerifCode'\cf4 ] : \cf5 ''\cf4 ;\
    $email = 
\f0\b \cf2 isset
\f1\b0 \cf4 ($_POST[\cf5 'EmailAdress'\cf4 ]) ? $_POST[\cf5 'EmailAddress'\cf4 ] : \cf5 ''\cf4 ;\
\
    \cf6 // Hash the password using bcrypt with automatically generated salt\cf4 \
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);\
    Echo password_hash;\
    \cf6 // SQL query to fetch user based on mobile number\cf4 \
 \cf6 //   $sql = "INSERT INTO  users(username,email,password_hash,first_name,last_name,registration_date,last_login,is_active,role_id,user_type,mobile_number,verification_code) VALUES('$username','$email','$hashed_password','$forename','$surname',GETDATE(),GETDATE(),0,' ','RIDER','$userphoneno','$verificationcode')";\cf4 \
\
    \cf6 // Prepare and execute the SQL query\cf4 \
 \cf6 //   $stmt = $conn->prepare($sql);\cf4 \
   \cf6 // $stmt->bindParam(':mobileNumber', $mobileNumber, PDO::PARAM_STR);\cf4 \
  \cf6 //  $stmt->execute();\cf4 \
\
    \cf6 // Fetch the first matching user as an associative array\cf4 \
  \cf6 //  $user = $stmt->fetch(PDO::FETCH_ASSOC);\cf4 \
\
\cf6 //    if ($stmt) \{\cf4 \
\cf6 //        echo "User Added";\cf4 \
\cf6 //    \} else \{\cf4 \
\cf6 //        echo "User Not Added";\cf4 \
 \cf6 //   \}\cf4 \
\} catch (PDOException $e) \{\
    \cf6 // Handle database connection errors\cf4 \
    
\f0\b \cf2 echo
\f1\b0 \cf4  \cf5 "Database Error: "\cf4  
\f0\b \cf2 .
\f1\b0 \cf4  $e->getMessage();\
    
\f0\b \cf2 exit
\f1\b0 \cf4 ;\
\cf6 //\} finally \{\cf4 \
    \cf6 // Close the database connection\cf4 \
    $conn = null;\
\cf6 //\}\cf4 \

\f0\b \cf2 ?>
\f1\b0 \cf4 \
\
}