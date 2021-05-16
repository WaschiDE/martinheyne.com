<?php
include 'timestamp.php';

$input = $_GET['pinnnickname'] . '|' . $_GET['pinnemail'] . '|' .  $_GET['pinnnachricht'];
echo $input;
$timestamp = getUtcTimestamp();
echo $timestamp;

$file = 'pinn.txt';
$current = "\n" . $input . "|" . $timestamp ;
$current .= file_get_contents($file);

file_put_contents($file, $current);

header('Location: pinnabsend.html');
exit;
