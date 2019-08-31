<?php
$phone = $_GET['phone'];
$msg = 'Dear , Your request for insurance quotes was successfully submitted. You will be contacted within minutes! Thank you.';
$url = 'http://www.smsmarketingportal.com/components/com_spc/smsapi.php?username=Emmerlee&password=Chinex_123&sender=KeyVertical&recipient='.$phone.'&message='.urlencode($msg);
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

$data = curl_exec($ch);
if($data=== false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
    echo 'SMS Sent To User';
}

curl_close($ch);
//print_r($data);

?>