<?php
include('config.php');

function getAccessToken() {
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $credentials = base64_encode(MPESA_CONSUMER_KEY . ':' . MPESA_CONSUMER_SECRET);
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($curl);
    curl_close($curl);
    
    $result = json_decode($response);
    return $result->access_token ?? null;
}
function stkPushRequest($phone, $amount) {
    $accessToken = getAccessToken();
    $timestamp = date('YmdHis');
    $password = base64_encode(MPESA_SHORTCODE . MPESA_PASSKEY . $timestamp);
    
    $requestBody = [
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
    ];
    
    $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json'
    ]);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestBody));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($curl);
    curl_close($curl);
    
    return json_decode($response, true);
}
?>

