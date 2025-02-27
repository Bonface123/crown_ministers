<?php
include 'config.php';

function getAccessToken() {
    $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    $credentials = base64_encode(MPESA_CONSUMER_KEY . ":" . MPESA_CONSUMER_SECRET);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic " . $credentials]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response)->access_token ?? null;
}

function stkPush($phone, $amount) {
    $token = getAccessToken();
    if (!$token) {
        return ["status" => "error", "message" => "Failed to generate access token"];
    }

    $url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
    $timestamp = date("YmdHis");
    $password = base64_encode(MPESA_SHORTCODE . MPESA_PASSKEY . $timestamp);

    $payload = json_encode([
        "BusinessShortCode" => MPESA_SHORTCODE,
        "Password" => $password,
        "Timestamp" => $timestamp,
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $amount,
        "PartyA" => $phone,
        "PartyB" => MPESA_SHORTCODE,
        "PhoneNumber" => $phone,
        "CallBackURL" => MPESA_CALLBACK_URL,
        "AccountReference" => "Donation",
        "TransactionDesc" => "Donation Payment"
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $token,
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
?>
