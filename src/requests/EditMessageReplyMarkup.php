<?php


namespace bobroid\telegramApi\requests;


class EditMessageReplyMarkup extends BaseRequest
{

    public  $chat_id,
            $message_id,
            $inline_message_id,
            $reply_markup;

}