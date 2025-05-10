<?php
// Withdraw functionality
<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $amount = floatval($_POST['amount']);
    $bank_name = $_POST['bank_name'];
    $account_number = $_POST['account_number'];
    $ifsc = $_POST['ifsc_code'];

    // Get current RC balance
    $stmt = $pdo->prepare("SELECT rc_balance FROM wallets WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $rc_balance = $stmt->fetchColumn();

    if ($amount <= $rc_balance && $amount > 0) {
        // Deduct amount from RC Wallet
        $pdo->prepare("UPDATE wallets SET rc_balance = rc_balance - ? WHERE user_id = ?")
            ->execute([$amount, $user_id]);

        // Save withdrawal request
        $pdo->prepare("INSERT INTO withdrawals (user_id, amount, bank_name, account_number, ifsc_code)
                       VALUES (?, ?, ?, ?, ?)")
            ->execute([$user_id, $amount, $bank_name, $account_number, $ifsc]);

        $message = "Withdrawal request of ₹$amount submitted successfully.";
    } else {
        $message = "Insufficient balance or invalid amount.";
    }
}
?>

<h2>Withdraw from R/C Wallet</h2>

<form method="POST">
    <label>Amount (₹):</label><br>
    <input type="number" name="amount" required><br><br>

    <label>Bank Name:</label><br>
    <input type="text" name="bank_name" required><br><br>

    <label>Account Number:</label><br>
    <input type="text" name="account_number" required><br><br>

    <label>IFSC Code:</label><br>
    <input type="text" name="ifsc_code" required><br><br>

    <button type="submit">Withdraw</button>
</form>

<p style="color:green;"><?php echo $message; ?></p>
<a href="wallet.php">← Back to Wallet</a>

?>