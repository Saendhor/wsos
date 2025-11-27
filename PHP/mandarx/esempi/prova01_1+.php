<?php

$string = "202501311259";
$time = strtotime($string);
$formatted = date("d-m-Y H:i", $time);
echo "$formatted<br>";

// altro esempio:
$yyyymmddhhm = date('YmdHi');
$time = strtotime($yyyymmddhhm);
$formatted = date("d-m-Y H:i", $time);
echo "$formatted<br>";

// altro approccio
// estrazione sottostringhe
$anno   = substr($yyyymmddhhm, 0, 4);
$mese   = substr($yyyymmddhhm, 4, 2);
$giorno = substr($yyyymmddhhm, 6, 2);
$ora    = substr($yyyymmddhhm, 8, 2);
$min    = substr($yyyymmddhhm, 10, 2);

// ricomposizione
$formatted = $giorno . "-" . $mese . "-" . $anno . " " . $ora . ":" . $min;
echo "$formatted<br>";

?>