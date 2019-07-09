<?php


namespace bobroid\telegramApi\requests;


class PinChatMessage extends BaseRequest
{

    public  $chat_id,
            $message_id;

}