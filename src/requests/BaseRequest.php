<?php


namespace bobroid\telegramApi\requests;


use bobroid\telegramApi\TelegramApi;

abstract class BaseRequest
{

    private $methodName;

    /**
     * @return array
     */
    public function getRequestData(): array
    {
        return array_filter(get_object_vars($this), 'trim');
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        if ($this->methodName === null) {
            $this->methodName = (join('', array_slice(explode('\\', get_class($this)), -1)));
        }

        return $this->methodName;
    }

    /**
     * @return \stdClass|null
     * @throws \ErrorException
     * @throws \Exception
     */
    public function sendRequest(): ?\stdClass
    {
        return TelegramApi::getInstance()->sendRequestToTelegram($this);
    }

}