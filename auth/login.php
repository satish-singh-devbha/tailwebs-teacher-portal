<?php
session_start();
$config = include "../config/config.php";
include "../includes/functions.php";

$username = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $error = login($config);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <script>
        function validateForm() {
            let username = document.getElementById('username').value.trim();
            let password = document.getElementById('password').value.trim();
            if (username === '' || password === '') {
                alert('Please fill in both fields.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST" action="" onsubmit="return validateForm()">
            <div class="input-group">
                <!-- <label for="username">Username</label> -->
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>">
            </div>
            <div class="input-group">
                <!-- <label for="password">Password</label> -->
                <input type="password" id="password" name="password" placeholder="Password" >
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
