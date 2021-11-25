<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://openapi.rubiesbank.io/v1/paycodegenerate",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"withdrawalchannel\": \"ATM\",\n    \"reference\": \"159691553712345\",\n    \"amount\": \"3000\",\n    \"withdrawalpin\": \"4321\",\n    \"requestid\": \"159691553733331234\",\n    \"tokenexpiryminutes\": \"180\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization:  SK-0000852761518128965-PROD-B131072456354426A86D093724AEDE0806053B8C0C9E4CED94ABB2615BD0AFE7"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;