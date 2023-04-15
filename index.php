<?php
include './bot..php';

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);
/*$chat_id = $update['message']['chat']['id'] || '6092238612';
$message = $update['message']['text'];*/

$automateBot = new AutomateBot('hay jamón?', '6092238612');

$automateBot->replyMessage();