<?php
//Funktion 1
function getUtcTimestamp(){return gmdate('Y-m-d H:i');};
//Funktion 2
function utcToLocalTime($input, $format = 'd.m.Y H:i', $timezone = 'Europe/Berlin'){
	$heuteBerlin = new DateTime($input, new DateTimeZone('UTC'));
    $heuteBerlin->setTimeZone(new DateTimeZone($timezone));
    return $heuteBerlin->format($format);
}