<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ZOW Wallet - Home</title>
  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    /* 3D Popup Card */
    .wallet-popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) rotateX(0deg);
      background: linear-gradient(145deg, #1f1f2e, #2e2e42);
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
      padding: 30px;
      width: 320px;
      z-index: 1001;
      display: none;
      animation: popupIn 0.4s ease;
      color: #fff;
      perspective: 800px;
    }

    @keyframes popupIn {
      0% { transform: translate(-50%, -60%) scale(0.5); opacity: 0; }
      100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
    }

    .wallet-popup h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .wallet-popup button {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 12px;
      font-size: 16px;
      font-weight: bold;
      background: #ffd700;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s;
    }

    .wallet-popup button:hover {
      background: #ffbf00;
      transform: scale(1.03);
    }

    .overlay-blur {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: rgba(0,0,0,0.6);
      z-index: 1000;
      display: none;
    }
  </style>
</head>
<body>
 <!-- Header -->
 <header class="top-header">
    <div class="logo"><i class="fa-solid fa-rocket"></i> ZOW Wallet</div>
    <nav style="margin-right: 50px;">
    <a href="home.php"><i class="fa-solid fa-house"></i> Home</a>
      <a href="#" id="walletBtn"><i class="fa-solid fa-wallet"></i> Wallet</a>
      <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
      <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </nav>
  </header> 


  <!-- Wallet Popup --><?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ZOW Wallet - Home</title>
  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    /* 3D Popup Card */
    .wallet-popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) rotateX(0deg);
      background: linear-gradient(145deg, #1f1f2e, #2e2e42);
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
      padding: 30px;
      width: 320px;
      z-index: 1001;
      display: none;
      animation: popupIn 0.4s ease;
      color: #fff;
      perspective: 800px;
    }

    @keyframes popupIn {
      0% { transform: translate(-50%, -60%) scale(0.5); opacity: 0; }
      100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
    }

    .wallet-popup h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .wallet-popup button {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 12px;
      font-size: 16px;
      font-weight: bold;
      background: #ffd700;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: 0.3s;
    }

    .wallet-popup button:hover {
      background: #ffbf00;
      transform: scale(1.03);
    }

    .overlay-blur {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: rgba(0,0,0,0.6);
      z-index: 1000;
      display: none;
    }
  </style>
</head>
<body>


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
