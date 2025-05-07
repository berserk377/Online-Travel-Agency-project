<?php
session_start();

//reg

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'travel';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   // Hash the password
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   // Use prepared statement to insert data
   $sql = "INSERT INTO register (name, email, password) VALUES (?, ?, ?)";
   $stmt = mysqli_prepare($conn, $sql);
   mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);

   if (mysqli_stmt_execute($stmt)) {
       session_start();
       $_SESSION['registration_message'] = "Registration successful!";
       header('location:http://localhost/travel/index.php'); // Redirect to index.php or any other page
   } else {
       echo "Registration failed";
   }

   mysqli_stmt_close($stmt);
}

mysqli_close($conn);



//login
if (isset($_POST['login_submit'])) {
    
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT name, password FROM register WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $dbName, $dbPasswordHash);
    mysqli_stmt_fetch($stmt);

    if (password_verify($password, $dbPasswordHash)) {
        session_start();
        $_SESSION['email'] = $email; 
        
        $_SESSION['name'] = $dbName;
        $_SESSION['login_message'] = "Login successful! Welcome, $dbName!";
        header('Location: http://localhost/travel/index.php'); // Redirect to index.php or any other page



    
    exit();

     //booking end
         
    } else {
        $_SESSION['login_message'] = "Invalid email or password.";
        header('Location: http://localhost/travel/login.php'); // Redirect back to login page with message
        exit();
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


//logout

if (isset($_POST['logout'])) {
    // Clear session variables
    session_unset();

    // Destroy the session
    session_destroy();

    
    // Set the logout success session variable
    $_SESSION['logout_successful'] = true;

    // Redirect to login page or any other page
    header('Location: http://localhost/travel/index.php'); // Replace with your desired URL
    exit();
}


?>

