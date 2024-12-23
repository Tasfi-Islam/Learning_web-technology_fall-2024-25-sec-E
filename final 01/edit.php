<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html');  
    }

    if(isset($_REQUEST['id'])){
        echo $_REQUEST['id'];
    }

    $user = ['id'=>1, 'username'=>'Tasfi', 'email'=>'tasfi@aiub.edu', 'password'=>122];
    

    
?>

<html>
<head>
    <title>Edit Page</title>
</head>
<body>
        <h2>Edit User</h2>
        <form method="post" action="update.php" enctype=""> 
            Name: <input type="text" name="username" value="<?=$user['username']?>" /> <br>
            password: <input type="password" name="password" value="<?=$user['password']?>" /><br>
            Email: <input type="email" name="email" value="<?=$user['email']?>" /><br>
            <input type="submit" name="submit" value="Submit" />
        </form>
</body>
</html>