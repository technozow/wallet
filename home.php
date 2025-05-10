<?php
include "navbar.php";
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ZOW Wallet - Home</title>
  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  
</head>
<body>
 

  <!-- Hero Section -->
  <section class="hero">
    <div class="coin-container">
      <div class="zow-coin"></div>
    </div>
  </section>

  <!-- Wallet Popup -->
  <div class="overlay-blur" id="walletOverlay" onclick="closeWalletPopup()"></div>
  <div class="wallet-popup" id="walletCard">
    <h2><i class="fa-solid fa-coins"></i> Wallet</h2>
    <button onclick="window.location.href='deposit.php'">
  <i class="fa-solid fa-arrow-down"></i> Deposit</button>
    <button onclick="alert('Withdraw form coming soon!')"><i class="fa-solid fa-arrow-up"></i> Withdraw</button>
    <button onclick="alert('Withdraw form coming soon!')"><i class="fa-solid fa-arrow-up"></i> Unlock My Money</button>
  </div>

  <!-- Script -->
  <script>
    const walletBtn = document.getElementById('walletBtn');
    const walletCard = document.getElementById('walletCard');
    const walletOverlay = document.getElementById('walletOverlay');

    walletBtn.addEventListener('click', () => {
      walletCard.style.display = 'block';
      walletOverlay.style.display = 'block';
    });

    function closeWalletPopup() {
      walletCard.style.display = 'none';
      walletOverlay.style.display = 'none';
    }
  </script>
</body>
</html>
