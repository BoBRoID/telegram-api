<?php


namespace bobroid\telegramApi;


use bobroid\telegramApi\requests\BaseRequest;
use Curl\Curl;

class TelegramApi
{

    public const TELEGRAM_API_ENDPOINT = 'https://api.telegram.org/';

    /**
     * @var self|null
     */
    private static $instance;

    private $apiKey,
            $botName;

    /**
     * TelegramApi constructor.
     * @param string $apiKey
     * @param string $botName
     */
    public function __construct(string $apiKey, string $botName)
    {
        $this->apiKey = $apiKey;
        $this->botName = $botName;
    }

    /**
     * @param string $apiKey
     * @param string $botName
     */
    public static function initInstance(string $apiKey, string $botName): void
    {
        if (self::$instance !== null) {
            return;
        }

        self::$instance = new self($apiKey, $botName);
    }

    /**
     * @param string|null $apiKey
     * @param string|null $botName
     * @return TelegramApi
     * @throws \Exception
     */
    public static function getInstance(?string $apiKey = null, ?string $botName = null): self
    {
        if (self::$instance === null) {
            if ($apiKey === null || $botName === null) {
                throw new \Exception('You should provide ApiKey and BotName!');
            }

            self::initInstance($apiKey, $botName);
        }

        return self::$instance;
    }

    /**
     * @param BaseRequest $request
     * @return \stdClass|null
     * @throws \ErrorException
     */
    public function sendRequestToTelegram(BaseRequest $request): ?\stdClass
    {
        $curl = new Curl();
        $curl->setHeader('Content-Type', 'application/json');

        return $curl->post(self::TELEGRAM_API_ENDPOINT."/bot{$this->apiKey}/{$request->getMethodName()}", json_encode($request->getRequestData()));
    }

}