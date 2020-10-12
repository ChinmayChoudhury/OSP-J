<?php
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=47.247.8.58"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
print_r($geo);
// $state
?>