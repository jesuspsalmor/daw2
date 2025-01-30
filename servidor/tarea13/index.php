
<?php

$api_key = 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJqZXN1c3BzYWx2YWRvcjkwQGdtYWlsLmNvbSIsImp0aSI6Ijg3YTlmYmNlLTE3NzctNDU1Ni1iMDkyLWFlMjIzMjMzZWVkMyIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNzM4MTk0ODE2LCJ1c2VySWQiOiI4N2E5ZmJjZS0xNzc3LTQ1NTYtYjA5Mi1hZTIyMzIzM2VlZDMiLCJyb2xlIjoiIn0.L-Qr0Re0vWrAACAxo8HoFDLyNo2KSeAfMLoJFFOAPi4';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://opendata.aemet.es/opendata/api/valores/climatologicos/inventarioestaciones/todasestaciones/?api_key=' . $api_key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'cache-control: no-cache'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  echo $response;
}
?> 

