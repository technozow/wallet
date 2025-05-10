<?php
include 'includes/db.php';
include "navbar.php";


// Get the active QR code from the database
$activeQR = $conn->query("SELECT * FROM payment_details WHERE is_active = 1 LIMIT 1")->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ZOW Wallet - Home</title>
  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    /* Your existing styles... */
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: radial-gradient(ellipse at center, #000000 0%, #0a0a0a 100%);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card-container {
      display: flex;
      gap: 30px;
    }

    .deposit-card {
      background: #111;
      border: 1px solid #333;
      border-radius: 16px;
      padding: 25px 30px;
      text-align: center;
      box-shadow: 0 0 15px rgba(255, 255, 0, 0.4);
      cursor: pointer;
      transition: transform 0.3s;
    }

    .deposit-card:hover {
      transform: scale(1.05);
    }

    .deposit-card h3 {
      margin-bottom: 10px;
      color: #FFD700;
    }

    .popup, .qr-section, .bank-section {
      display: none;
      position: absolute;
      top: 20%;
      left: 50%;
      transform: translate(-50%, -20%);
      background: #222;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
      z-index: 10;
      width: 350px;
    }

    .popup h4, .qr-section h4, .bank-section h4 {
      margin-bottom: 15px;
      color: #FFD700;
    }

    .popup p, .qr-section p, .bank-section p {
      color: #ccc;
    }

    .close-btn {
      margin-top: 15px;
      background: red;
      border: none;
      padding: 10px 20px;
      color: white;
      border-radius: 10px;
      cursor: pointer;
    }

    img.qr-image {
      width: 100%;
      border-radius: 12px;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="card-container">
    <div class="deposit-card" onclick="showQR()">
      <h3>Deposit ≤ ₹2000</h3>
      <p>Show UPI & QR Code</p>
    </div>
    <div class="deposit-card" onclick="showBank('mid')">
      <h3>₹2000 - ₹30000</h3>
      <p>Show Bank Details</p>
    </div>
    <div class="deposit-card" onclick="showBank('high')">
      <h3>₹30000 - ₹1 Lakh</h3>
      <p>Show Bank Details</p>
    </div>
  </div>

  <!-- QR Section -->
  <div class="qr-section" id="qrSection" style="display:none;">
    <h4>Scan & Pay</h4>
    <p>UPI ID: <strong>zowwallet@upi</strong></p>

    <!-- Dynamically update the QR image source -->
    <img src="<?= $activeQR ? $activeQR['qr_code_path'] : 'assets/qr-code.png' ?>" alt="QR Code" class="qr-image">

    <button class="close-btn" onclick="closePopup()">Close</button>
  </div>

  <!-- Bank Section -->
  <div class="bank-section" id="bankSection" style="display:none;">
    <h4>Bank Account Details</h4>
    <p><strong>Account Name:</strong> ZOW Technologies</p>
    <p><strong>Account No:</strong> 1234567890</p>
    <p><strong>IFSC:</strong> ZOWB0001234</p>
    <p><strong>Bank Name:</strong> ZOW Bank Pvt Ltd</p>
    <button class="close-btn" onclick="closePopup()">Close</button>
  </div>

  <script>
    function showQR() {
      // Display the QR section and hide the bank section
      document.getElementById('qrSection').style.display = 'block';
      document.getElementById('bankSection').style.display = 'none';
    }

    function showBank(level) {
      // Display the bank section and hide the QR section
      document.getElementById('qrSection').style.display = 'none';
      document.getElementById('bankSection').style.display = 'block';
    }

    function closePopup() {
      // Close both sections
      document.getElementById('qrSection').style.display = 'none';
      document.getElementById('bankSection').style.display = 'none';
    }
  </script>
</body>
</html>
