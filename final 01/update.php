<?php
    
    session_start();

    if(!isset($_COOKIE['status'])){
        header('Location: login.html');
        exit();
    }

    
    $user = [
        'id' => 1,
        'username' => 'Tasfi',
        'email' => 'tasfi@aiub.edu',
        'password' => '122',  
    ];

    
    if (isset($_POST['submit'])) {
      
        $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
        $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
        $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format. Please try again.";
            exit();
        }

        
        if (strlen($password) < 6) {
            echo "Password should be at least 6 characters long.";
            exit();
        }

      
        $user['username'] = $username;
        $user['email'] = $email;
        $user['password'] = $password;  

        $_SESSION['user'] = $user;

        
        echo "User information updated successfully!<br>";
        echo "Updated Username: " . $user['username'] . "<br>";
        echo "Updated Email: " . $user['email'] . "<br>";
        echo "Password is updated (but it's not shown for security reasons).<br>";

        
        
        exit();
    }
?>

<html>
<head>
    <title>Update User Information</title>
</head>
<body>
    <h2>Update Your Information</h2>
    <form method="post" action="update.php">
        Name: <input type="text" name="username" value="<?= htmlspecialchars($user['username']); ?>" /><br>
        Password: <input type="password" name="password" value="<?= htmlspecialchars($user['password']); ?>" /><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" /><br>
        <input type="submit" name="submit" value="Update" />
    </form>
</body>
</html>
