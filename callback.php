<?php
include('includes/db_connect.php');

$data = file_get_contents('php://input');
$decoded = json_decode($data, true);

if ($decoded && isset($decoded['Body']['stkCallback'])) {
    $callback = $decoded['Body']['stkCallback'];
    $resultCode = $callback['ResultCode'];
    $resultDesc = $callback['ResultDesc'];

    if ($resultCode == "0") {
        $amount = $callback['CallbackMetadata']['Item'][0]['Value'];
        $mpesaCode = $callback['CallbackMetadata']['Item'][1]['Value'];
        $phone = $callback['CallbackMetadata']['Item'][4]['Value'];

        // Update donation status
        $sql = "UPDATE donations SET status = 'Completed', mpesa_code = ? WHERE phone = ? AND amount = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mpesaCode, $phone, $amount]);

        echo "Success";
    } else {
        echo "Transaction Failed: " . $resultDesc;
    }
} else {
    echo "Invalid callback data";
}
?>
