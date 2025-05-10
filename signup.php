<?php
require 'includes/db.php'; // Make sure this uses PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        // Insert into users table (assuming you have a users table for storing user info)
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->execute();

        // Get the user_id of the newly inserted user
        $user_id = $conn->lastInsertId(); // Get the user_id of the newly inserted user

        // Now insert into wallets table with the generated user_id
        $wallet_stmt = $conn->prepare("INSERT INTO wallets (user_id, rc_balance, vc_balance) VALUES (:user_id, :rc_balance, :vc_balance)");
        $wallet_stmt->bindValue(':user_id', $user_id);
        $wallet_stmt->bindValue(':rc_balance', 0.00);
        $wallet_stmt->bindValue(':vc_balance', 0.00);
        $wallet_stmt->execute();

        // Redirect to login page
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Signup failed: " . $e->getMessage();
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ZOW Wallet – Signup</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      background: radial-gradient(circle at 20% 20%, #0f0f3f, #000000 80%);
      overflow: hidden;
      color: #fff;
    }

    .stars {
      position: absolute;
      width: 100%;
      height: 100%;
      background: url('https://raw.githubusercontent.com/VincentGarreau/particles.js/master/demo/media/stars.png') repeat;
      animation: moveStars 100s linear infinite;
      z-index: 0;
    }

    @keyframes moveStars {
      from {background-position: 0 0;}
      to {background-position: -10000px 5000px;}
    }

    .signup-container {
      position: relative;
      z-index: 2;
      width: 360px;
      margin: 100px auto;
      padding: 30px 40px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 40px rgba(0, 255, 255, 0.2);
      backdrop-filter: blur(12px);
      border-radius: 12px;
      transform: perspective(1000px) rotateY(4deg);
    }

    .signup-container h2 {
      text-align: center;
      margin-bottom: 24px;
      font-size: 1.8em;
      letter-spacing: 1px;
    }

    .signup-container input {
      width: 100%;
      padding: 12px 14px;
      margin: 10px 0;
      border: none;
      border-radius: 6px;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      font-size: 16px;
      outline: none;
      box-shadow: inset 0 0 8px #0ff;
      transition: 0.3s ease;
    }

    .signup-container input:focus {
      box-shadow: 0 0 15px #0ff;
      background: rgba(255, 255, 255, 0.15);
    }

    .signup-container button {
      width: 100%;
      padding: 12px;
      margin-top: 10px;
      background: linear-gradient(135deg, #00faff, #004dff);
      border: none;
      border-radius: 6px;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 0 15px #0ff;
      transition: 0.3s ease;
    }

    .signup-container button:hover {
      background: linear-gradient(135deg, #004dff, #00faff);
      box-shadow: 0 0 25px #0ff;
    }
  </style>
</head>
<body>
  <div class="stars"></div>
  <div class="signup-container">
    <h2>Create Your ZOW Wallet</h2>
    <form action="signup.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Sign Up</button>
    </form>
  </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        echo "<script>alert('Signup successful!'); window.location='login.php';</script>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
