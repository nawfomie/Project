

<?php
session_start(); // Start session to store login state
include("config2.php");
// Hardcoded credentials for the account

define('USERNAME', 'bendarmohamed7@gmail.com');
define('PASSWORD', 'NANA2002');

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['emailName']);
    $password = trim($_POST['passName']);

    // Check if the credentials match
    if ($username === USERNAME && $password === PASSWORD) {
        // Store login state in session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the protected page
        header("Location: read.php");
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Sign in</title>
    
</head>
<body>
    
    <link rel="stylesheet" href="signup.css">
    
    <center>
<div class="form-container" >
        <h2>Sign in</h2>
        <form action="" method="POST">
            <label for="email">Email:</label>
            
            <input value="<?php if(isset($emailvalue)) echo $emailvalue  ?>" name='emailName' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
            
            <label for="password">Password:</label>
            <input name='passName' type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
            <span style="color: red;"><?php if(isset($passvalue)) echo $passerror ?></span><br>

            <button name='submit' type="submit">Login</button>
            <p> do you want to create a new acc ?<a href="signup.php">sign up</p>
        </form>
    </div>
</center>
  
</body>
</html>