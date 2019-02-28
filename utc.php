 <?php
(float)$_POST['tel'];

$data = array('phone' =>'79996479245');
$filter = $data;
$data_string = json_encode($filter);

$url = 'http://geohelper.info/api/v1/phone-data?apiKey=k0OJnUIhJ3SR5DNWx3qRaSY5Wvdtl8JJ&locale%5Blang%5D=ru&filter%5Bphone%5D='.$_POST['tel'];

$curl = curl_init($url);
 
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))                              
);                                                                                                                   
$result = curl_exec($curl);
curl_close($curl); 

$json_out = json_decode($result,true);
file_put_contents('JSON.txt',$result); 
echo $json_out["result"]["region"]["timezoneOffset"];
?>