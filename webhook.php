<?php

$payload = file_get_contents('php://input');

$data = json_decode($payload, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
    exit;
}

$custumerMobile = $data['custumer_mobile'] ?? null;
$utr = $data['utr'] ?? null;
$remark = $data['remark'] ?? null;
$txnId = $data['txn_id'] ?? null;
$createAt = $data['create_at'] ?? null;
$orderId = $data['order_id'] ?? null;
$status = $data['status'] ?? null;
$amount = $data['amount'] ?? null;


if (empty($orderId) || empty($status)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

echo json_encode(['status' => 'success', 'message' => 'Webhook received successfully']);