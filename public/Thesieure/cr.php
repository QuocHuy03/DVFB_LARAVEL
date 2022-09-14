<?php
include_once __DIR__ . '/libs/simple_html_dom.php';
$access = true;
$dom = new simple_html_dom();

$cookie = "remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d=eyJpdiI6ImJXakxjTVpmcWtvWVV3OU1GdkMyOGc9PSIsInZhbHVlIjoiQkVrQVVENjJqVkRZUEtxbHVEQkswRVRLM01ESk9nMmJcLzgwQko1dmJ0SEtoY3dIXC91dUNcL2pDdU40VWFuXC9xV3ArTDNUOTRqTldmYW1IeE9vOWZrQ09BVDhXRVV1RWxcL25RUUpWZVpUUTFLdEpJbTl0VWJIYXhmUnY1eFwvb09XMm9aK2pZUzdtcVBGcVBnVStKY25SbjI2aFpCeHlCZ214RzlmR25QWWhtVXJqSzJ2em5MbDhkYjNDQzFGbWxxd2dxIiwibWFjIjoiZWUxYTE0ZWE1NmY4ZDNmMTM3YTg0MGYwOTI4MTQwZDg1YTBjYjk3Njc3ZjgzZjM0Y2FiYzBiM2ZjOTZiNmNiOSJ9; PHPSESSID=42kmhbkipu27884uk8fpaqf78r; XSRF-TOKEN=eyJpdiI6IjhSK2k5aG1qU0tZZk5wYzlRMjN2dFE9PSIsInZhbHVlIjoiam5kS1lRaEwxeEJ2dzVXNExRa2VyY2VzTjl1WnNWWVl6bHF6aTBMbFRxRlVMMUkxSmc3b2FzNFwvQ1ZtSVVLNk4iLCJtYWMiOiI0N2ZkYTVmZGFlOGVmMDMzNzBiOWYyZDgyNDk2NjZkZjVkZjg2OTY0ODUwNWZkMWNlOTg1Yjc4OWZkMjk5MmJlIn0=; web_session=eyJpdiI6IkN4ZmFmWDJCSkFwT3d6ejVibWZQNXc9PSIsInZhbHVlIjoiTFo3OElpNHYwbEdYNUFcL3hQZlY2QlRSREdoQW5vZVQ2U0FneVBRN0x2Qk5lZ0ZvT1pVXC9EVWI5bHZcL1JYMFFBQyIsIm1hYyI6ImQ0NDYzOTI4ZGZiMGJhM2Q0NzgxZmNkYTE0ZjE3YWJmNGMzZTI0ZjAwZTRmODc0ZTY4YmQ4MDdlNjk5MWYwYzUifQ==; lang_code=eyJpdiI6IkJFekpJeTJZVXFPa0pySlR4RU9VWkE9PSIsInZhbHVlIjoiM1hEYXNvZ3p5d3ZlTlY4d2lBdjhqUT09IiwibWFjIjoiYzYwZmFjNjczN2YwOTAzMGZlNDJlZmRhZWI1NmNmZGY0OTdlMmEzMjhkZDdlZjI0ZTJlZjJhMzJkY2QxYjBlOCJ9; client_info=eyJpdiI6IjRLOSszR2tZb0tXV3JmbmZrd0p4NUE9PSIsInZhbHVlIjoiK2ZranROZmtOd0hLYjJCNGNXcllmQT09IiwibWFjIjoiMDYzZTkxZjMwYjRlZTYzNzllZjY2YWRkZGNkZjEyNzY0ZjY0MmE4OGIxZGNjN2M0MmFkNGNmZjhmM2I3MDY3YiJ9; TCK=c5e3e3e2912f94488ef60cacd8332500";

// echo $value['cookie'];
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
        'Cookie: ' . $cookie,
    ),
));

$response = curl_exec($curl);

curl_close($curl);

if (!empty($response)) {
    $Get_Table = str_get_html($response)->find('tbody', 0);
    header("Content-Type: application/json");
    // Xuất dữ liệu
    foreach ($Get_Table->find('tr') as $Data) {
        $PricesExchange =  str_replace('đ', '', str_replace('+', '', str_replace(',', '', $Data->find('td', 2)->plaintext)));
        $tranid = $Data->find('td', 0)->plaintext;
        $usernamex = trim(explode('|||', $Data->find('td', 6)->plaintext)[0], 'haha');
        $usernamex = str_replace(' ', '', $usernamex);
        $Json_Datas[] = array(
            'trading_code' => $Data->find('td', 0)->plaintext,
            'before_money_cost' => $Data->find('td', 1)->plaintext,
            'amount' => $PricesExchange,
            'io' => substr($Data->find('td', 2)->plaintext, 0, 1) . '1',
            'after_money_cost' => $Data->find('td', 3)->plaintext,
            'time_created' => $Data->find('td', 5)->plaintext,
            'CODE' => $Data->find('td', 4)->plaintext,
            'content_send' => explode('|||', $Data->find('td', 6)->plaintext)[0],
            'usernamex' => $usernamex,
        );
    }
    echo (json_encode($Json_Datas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
