<?php
include('includes/db_connect.php');

$data = file_get_contents('php://input');
$mpesaResponse = json_decode($data, true);

if (isset($mpesaResponse['Body']['stkCallback'])) {
    $callbackData = $mpesaResponse['Body']['stkCallback'];
    
    $resultCode = $callbackData['ResultCode'];
    
    if ($resultCode == 0) {
        $mpesaReceipt = $callbackData['CallbackMetadata']['Item'][1]['Value'];
        $phoneNumber = $callbackData['CallbackMetadata']['Item'][4]['Value'];
        $amountPaid = $callbackData['CallbackMetadata']['Item'][0]['Value'];
        
        $sql = "UPDATE donations SET mpesa_code = ? WHERE phone = ? AND amount = ? ORDER BY donation_date DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mpesaReceipt, $phoneNumber, $amountPaid]);
    }
}
?>
