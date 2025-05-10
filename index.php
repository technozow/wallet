<?php
session_start();
require 'includes/db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and execute query (using $conn from db.php)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: home.php");
        exit();
    } else {
        $message = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZOW Wallet - Login</title>
    <style>
        body {
            background: radial-gradient(ellipse at bottom, #1b2735 0%, #090a0f 100%);
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.2);
            width: 360px;
            position: relative;
            z-index: 2;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
        }
        .login-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            outline: none;
            box-shadow: inset 0 0 8px #00ffff;
            transition: background 0.3s ease;
        }
        .login-container input:focus {
            background: rgba(255, 255, 255, 0.15);
        }
        .login-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #00faff, #004dff);
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 0 15px #00ffff;
            transition: box-shadow 0.3s ease;
        }
        .login-container button:hover {
            box-shadow: 0 0 25px #00ffff;
        }
        .login-container p.message {
            text-align: center;
            color: red;
        }
        .login-container p.signup-link {
            text-align: center;
        }
        .login-container p.signup-link a {
            color: cyan;
            text-decoration: none;
        }
    </style>
</head>
<body>

 
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p class="signup-link">Don't have an account? <a href="signup.php">Signup here</a></p>
    </div>
    <form action="signup.php" method="post">

</form>
</body>
</html>



