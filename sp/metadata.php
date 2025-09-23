<?php
header('Content-Type: text/xml');

$entityID = 'http://localhost:8080/metadata.php';
$acs = 'http://localhost:8080/acs.php';

echo <<<XML
<EntityDescriptor xmlns="urn:oasis:names:tc:SAML:2.0:metadata" entityID="$entityID">
  <SPSSODescriptor
      AuthnRequestsSigned="false"
      WantAssertionsSigned="false"
      protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">
    <AssertionConsumerService
        Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST"
        Location="$acs"
        index="1" />
  </SPSSODescriptor>
</EntityDescriptor>
XML;
