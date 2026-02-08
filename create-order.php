<?php

$orderId = "TEST".time();

$post_data = [
    'token_key' => '', // The API token key for authentication.
    'secret_key' => '', // The secret key for authorization.
    'amount' => '', // The amount for the order (eg. 100).
    'order_id' => $orderId, // Unique identifier for the order (eg. Abc123).
    'custumer_mobile' => '', // Customer's mobile number (eg. 123456790).
    'redirect_url' => '', // URL to redirect after payment (eg. https://zapupi.com).
    'remark' => '' // Additional remark or note for the order.
];

$response = setCurl("https://zapupi.com/api/create-order", $post_data);
echo 'Total Response JSON: '.$response.'<br><br>';
    
$result = json_decode($response, true);

if ($result && isset($result['status'])) {

    if ($result['status'] === 'success') {

        echo 'Status: ' . $result['status'] . '<br>';
        echo 'Message: ' . $result['message']. '<br>';
        echo 'Payment_Url: ' . $result['payment_url'];

    } else {

        echo 'Status: ' . $result['status'] . '<br>';
        echo 'Message: ' . $result['message'];
    }
} else {
    echo 'Invalid API response'; // Failed Response
}





function setCurl($api_url, $post_data) {

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = 'cURL Error: ' . curl_error($ch);
        curl_close($ch);
        return $error;
    }

    curl_close($ch);
    return $response;
}