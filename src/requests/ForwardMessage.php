<?php


namespace bobroid\telegramApi\requests;


class ForwardMessage extends BaseRequest
{

    public  $chat_id,
            $from_chat_id,
            $disable_notification,
            $message_id;

}