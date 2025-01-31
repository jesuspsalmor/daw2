<?php
//GET
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/apirest/api/personas");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
print_r($res);
curl_close($ch);
*/
//POST
$ch = curl_init();
$fields = array('id' => '5');
$fields_string = http_build_query($fields);
curl_setopt($ch, CURLOPT_URL, "http://localhost/apirest/api/personas");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
$res = curl_exec($ch);
//print_r($res);
curl_close($ch);
