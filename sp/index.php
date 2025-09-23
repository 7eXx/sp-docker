<?php
session_start();

$entityId = 'http://localhost:8080/metadata.php';
$idpSsoUrl = 'http://localhost:8000/saml2/idp/SSOService.php';

$requestID = '_' . bin2hex(random_bytes(10));
$_SESSION['AuthnRequestID'] = $requestID;

$issueInstant = gmdate('Y-m-d\TH:i:s\Z');

$authnRequest = <<<XML
<samlp:AuthnRequest
    xmlns:samlp="urn:oasis:names:tc:SAML:2.0:protocol"
    ID="$requestID"
    Version="2.0"
    IssueInstant="$issueInstant"
    ProtocolBinding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST"
    AssertionConsumerServiceURL="http://localhost:8080/acs.php">
  <saml:Issuer xmlns:saml="urn:oasis:names:tc:SAML:2.0:assertion">$entityId</saml:Issuer>
</samlp:AuthnRequest>
XML;

$deflated = gzdeflate($authnRequest);
$b64Request = base64_encode($deflated);
$redirectUrl = $idpSsoUrl . '?SAMLRequest=' . urlencode($b64Request);

header("Location: $redirectUrl");
exit;
