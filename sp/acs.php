<?php
session_start();

if (!isset($_POST['SAMLResponse'])) {
    http_response_code(400);
    echo "Missing SAMLResponse";
    exit;
}

$response = base64_decode($_POST['SAMLResponse']);

header('Content-Type: text/plain');
echo "✅ Ricevuta risposta SAML dall'IdP:\n\n";
echo $response;
