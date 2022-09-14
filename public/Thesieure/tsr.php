<?php
function str($string){
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
include_once __DIR__.'/libs/simple_html_dom.php';
$access = true;
$dom = new simple_html_dom();
$cookie = "PHPSESSID=42kmhbkipu27884uk8fpaqf78r; lang_code=eyJpdiI6IkJFekpJeTJZVXFPa0pySlR4RU9VWkE9PSIsInZhbHVlIjoiM1hEYXNvZ3p5d3ZlTlY4d2lBdjhqUT09IiwibWFjIjoiYzYwZmFjNjczN2YwOTAzMGZlNDJlZmRhZWI1NmNmZGY0OTdlMmEzMjhkZDdlZjI0ZTJlZjJhMzJkY2QxYjBlOCJ9; client_info=eyJpdiI6IjRLOSszR2tZb0tXV3JmbmZrd0p4NUE9PSIsInZhbHVlIjoiK2ZranROZmtOd0hLYjJCNGNXcllmQT09IiwibWFjIjoiMDYzZTkxZjMwYjRlZTYzNzllZjY2YWRkZGNkZjEyNzY0ZjY0MmE4OGIxZGNjN2M0MmFkNGNmZjhmM2I3MDY3YiJ9; TCK=c5e3e3e2912f94488ef60cacd8332500; remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d=eyJpdiI6IllrN0ZPdFJINURqMktKc0VYNDBLWXc9PSIsInZhbHVlIjoiWVwvN20xeE9uZ3ZoS0tVU3lmSzJRSEtNSjZXRmljXC9TY2N6U0dKekxCeUlQd2dXYlExRG5LcEk0NktnMEhnS0N6ZlZRaHhWK0VleVZNRmIyeGZyenc2SEdTVDFjVHFLUXhWdVVVZFhQSkRvSnRWVzdCUU9zVUhzRG1CbktTU0ZwNVBWVFBoSExGRDRSaWwrODEzT2lkXC9NclF2eCs1Vm8rV2dnRmpIVkRzMENlb1RDcHBYRUVDTlAyWkQ5UXJKejRcLyIsIm1hYyI6IjFlZTgzZDUwYmVmMWU0ZGUxOWZlNzFkZjkwMWU1Y2M0NWVjZjQ2NTRkZmYxOWE0MDdjYjI3NzEzOTAwMjE1NzIifQ==; user_secure=eyJpdiI6Ijc5dW11OWk4YmdTNjJKSmhxN0RMOUE9PSIsInZhbHVlIjoicTBWZStyU0toUG1MajBjSjQxYkFoMVVQckF0YTFMYmdhSEV4cFNIR2dENUNjcCswcjRzMTVJeiswUmFORXdEaCIsIm1hYyI6IjcwODdhZWZhZjE3MmNkM2Q4NGYwMTczOTQ2ODlkMTFlZmFjMDMzMWRjZjczM2NlNjdiM2ExNDI2ZjFmOTBmOWIifQ==; XSRF-TOKEN=eyJpdiI6IjVMSTNLUUxSNzBBR1dqanlwcDhkRGc9PSIsInZhbHVlIjoic2UrbzBZR1wvQys2UGZ1aUg5dHN4U1ViOERlbnQ5TW4zaWNyRFk3OVlEbDY1VG1SczZVUGM4TEVVWjIzK2NPOHYiLCJtYWMiOiIyYzcwZmFlM2ZmNzg1NThiMGJlOTdlNmQ3NmZhNmZhOWYyNWMwZWIxMDBkNzI1OTA1YTlmMTRjNGI0MGVkZjg3In0=; web_session=eyJpdiI6IjE1UFZRQVJGYnBaM2ZnaUlhUVVQSVE9PSIsInZhbHVlIjoiOWprczVIb3ZLWWt6RHJ0aVRFZFVLbytsdTdZTDFVb1d2bnNvMzJod0xVWklockJmR3V4bFNkSjMxc0UxZXFVUyIsIm1hYyI6IjFhNDhhZmM0OWE1NTFkOGYxZjdhNWRlZWM4MzllZmE5MzBjYTA3NWRkZjdjYTJkODQ1NGM0ODYyZjQ1NGIyZTEifQ==";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://thesieure.com/wallet/history/vnd',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Cookie: $cookie",
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.136 Safari/537.36'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

//print_r($response);

if(!empty($response)){
    $Get_Table = str_get_html($response)->find('tbody', 0);
header("Content-Type: application/json");
// Xuất dữ liệu
foreach ($Get_Table->find('tr') as $Data) {
    $Json_Datas[] = array(
            // Trạng thái trả về
            'trading_code' => $Data->find('td', 0)->plaintext,
            'before_money_cost' => $Data->find('td', 1)->plaintext,
            'amount' => $Data->find('td', 2)->plaintext,
            'io' => substr($Data->find('td', 2)->plaintext, 0, 1).'1',
            'after_money_cost' => $Data->find('td', 3)->plaintext,
            'time_created' => $Data->find('td', 5)->plaintext,
            'status' => $Data->find('td', 4)->plaintext,
            'content_send' => explode('|||', $Data->find('td', 6)->plaintext)[0],
        );
    }
    echo(json_encode($Json_Datas, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
}