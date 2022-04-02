<?php
session_start();
$token = $_GET['token'];
function decryption($string){
    $METHOD = "AES-256-CBC";
    $SECRET_KEY = "&ven%tas@2022";
    $SECRET_IV = "416246";
    $key = hash('sha256',$SECRET_KEY);
    $iv=substr(hash('sha256',$SECRET_IV),0,16);
    $output=openssl_decrypt(base64_decode($string),$METHOD,$key,0,$iv);
    return $output;
}
$decryptionToken = decryption($token);

$decryption = decryption($_SESSION['user'.$decryptionToken]);
$dataUser = explode('-',$decryption);
if(isset($_SESSION["user".$dataUser[3]])){
    unset($_SESSION["user".$dataUser[3]]);
    // session_destroy();
    header("Location: ../../logout");
}