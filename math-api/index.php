$ch = curl_init();

$data = array('numbers' => array(1, 2, 3));
$options = array(
CURLOPT_URL => 'http://localhost/php/math-api.php/sum',
CURLOPT_POST => 1,
CURLOPT_POSTFIELDS => json_encode($data),
CURLOPT_RETURNTRANSFER => 1
);

curl_setopt_array($ch, $options);

$response = curl_exec($ch);

curl_close($ch);

echo $response;