<?php
  // Function to get the client IP address
  function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
       	$ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
       	$ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
       $ipaddress = getenv('REMOTE_ADDR');
    else
       $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }
  
  $ip = get_client_ip();	
  $posicao = strpos($ip, ', ');
  if (substr($ip, $posicao, 2) == ', ')
     echo substr($ip, $posicao+2);
  else
     echo substr($ip, $posicao);
  echo "<br>";
?>
