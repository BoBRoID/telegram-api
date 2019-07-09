<?php


namespace bobroid\telegramApi\requests;


class SendPhoto extends BaseRequest
{

    public  $chat_id,
            $photo,
            $caption,
            $parse_mode,
            $disable_notification,
            $reply_to_message_id,
            $reply_markup;

}