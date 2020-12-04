<?php
include('aes.php');
$method=1;
if ($method==1){
    $result=date("Y-m-d",strtotime("+1 month"));
}else{
    $result=date("Y-m-d",strtotime("+1 year"));
}
// var_dump($result);
$key="1qazxsw23edcvfr4";
$hwid = intval('3e22b80d',16);
$curdt = intval(preg_replace('/-/', '', $result));
$curdt=$curdt+30;
$data = ($curdt<<32)|$hwid;
$bytes = pack('L', $data);
$dataArray = array();

for ($x = 0; $x < 4; $x++) {
  $temp = $hwid&0xFF;
  array_push($dataArray,$temp);
  $hwid = $hwid>>8;
}
for ($x = 0; $x < 4; $x++) {
  $temp = $curdt&0xFF;
  array_push($dataArray,$temp);
  $curdt =$curdt>>8;
}
for ($x = 0; $x < 8; $x++) {
  array_push($dataArray,0x01);
}

$strings = array_map("chr", $dataArray);
$string = implode("", $strings);
$aes = new AES($key);
$encrypted = $aes->encrypt($string);
$byte_array = unpack('C*', $encrypted);
$ret ="";
for ($i = 16; $i > 0; $i--) {
	$ret.=sprintf("%02X", $byte_array[$i]);	
	if($i>1&&(($i%2)==1))
		$ret.="-";
}
echo $ret;
?>

