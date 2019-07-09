<?php


namespace bobroid\telegramApi\requests;


class SendMessage extends BaseRequest
{

    public  $chat_id,
            $text,
            $parse_mode,
            $disable_web_page_preview,
            $disable_notification,
            $reply_to_message_id,
            $reply_markup;

}