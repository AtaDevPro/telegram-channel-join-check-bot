<?php

// channel check join bot

$input = file_get_contents("php://input");
$update = json_decode($input, true);
$printData = print_r($update, true);

define("API_TOKEN", "");

$channel_chat_id = -1002441103186;
$user_chat_id = $update['message']['from']['id'];
$text = $update['message']['text'];

function bot(string $methods, array $params)
{
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.telegram.org/bot" . API_TOKEN . "/$methods",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
    ]);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
}

function sendMessage(int|string $chat_id, string $text, int $message_thread_id = null, string $parse_mode = null, mixed $entities = null, mixed $link_preview_options = null, bool $disable_notification = null, bool $protect_content = null, mixed $reply_parameters = null, mixed $reply_markup = null)
{
    $params = [
        'chat_id' => $chat_id,
        'text' => $text
    ];
    if ($message_thread_id !== null) {
        $params['message_thread_id'] = $message_thread_id;
    }
    if ($parse_mode !== null) {
        $params['parse_mode'] = $parse_mode;
    }
    if ($entities !== null) {
        $params['entities'] = $entities;
    }
    if ($link_preview_options !== null) {
        $params['link_preview_options'] = $link_preview_options;
    }
    if ($disable_notification !== null) {
        $params['disable_notification'] = $disable_notification;
    }
    if ($protect_content !== null) {
        $params['protect_content'] = $protect_content;
    }
    if ($reply_parameters !== null) {
        $params['reply_parameters'] = $reply_parameters;
    }
    if ($reply_markup !== null) {
        $params['reply_markup'] = $reply_markup;
    }

    return bot('sendMessage', $params);
}

function debug(mixed $data)
{
    $printData = print_r($data, true);
    bot('sendMessage', [
        'chat_id' => 303898395,
        'text' => $printData
    ]);
}

function getChatMember(int|string $chat_id, int $user_id)
{
    $params = [
        'chat_id' => $chat_id,
        'user_id' => $user_id,
    ];
    return bot('getChatMember', $params);
}

if ($text) {
    $getJoin = getChatMember(chat_id: $channel_chat_id, user_id: $user_chat_id);
    if ($getJoin['result']['status'] == 'left') {
        $msg = 'سلام
لطفا داخل کانال زیر جوین بشید و ربات رو از اول استارت کنید
https://t.me/';
    } else {
        $msg = 'سلام
        شما داخل کانال جوین هستید';
    }
    sendMessage(chat_id: $user_chat_id, text: $msg);
    // debug($getJoin);
}


// ATADEVPRO