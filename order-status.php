<?php

$post_data = [
    'token_key' => '', // The API token key for authentication.
    'secret_key' => '', // The secret key for authorization.
    'order_id' => '', // Unique identifier for the order (eg. Abc123).
];

$response = setCurl("https://zapupi.com/api/order-status", $post_data);
echo 'Total Response JSON: '.$response.'<br><br>';
    
$result = json_decode($response, true);

if ($result && isset($result['status'])) {

    if ($result['status'] === 'success') {

        echo 'Status: ' . $result['status'] . '<br>';

        echo 'OrderId: ' . $result['data']['order_id']. '<br>';
        echo 'Status: ' . $result['data']['status']. '<br>';
        echo 'Amount: ' . $result['data']['amount']. '<br>';
        echo 'UTR: ' . $result['data']['utr']. '<br>';
        echo 'TxnId: ' . $result['data']['txn_id']. '<br>';
        echo 'Create_at: ' . $result['data']['create_at']. '<br>';
        echo 'Custumer Mobile: ' . $result['data']['custumer_mobile']. '<br>';
        echo 'Remark: ' . $result['data']['remark']. '<br>';

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