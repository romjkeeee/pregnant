<?php

namespace App\Services;

use GuzzleHttp\Client;

class Sms
{
    const API_URL = 'https://smsc.ru/sys/send.php';
    /**
     * @var $login string
     */
    private $login;
    /**
     * @var $password string
     */
    private $password;
    /**
     * @var $sender string
     */
    private $sender;

    /**
     * Sms constructor.
     */
    public function __construct()
    {
        $this->login = env('SMSCRU_LOGIN');
        $this->sender = env('SMSCRU_SENDER');
        $this->password = env('SMSCRU_PASSWORD');
    }

    /**
     * @return Sms
     */
    public static function init(): self
    {
        return new self();
    }

    /**
     * @param string $phone
     * @param string $message
     */
    public function send(string $phone, string $message): void
    {
        (new Client())->get("https://smsc.ru/sys/send.php?login=veaceslav_c&psw=sb782841&phones={$phone}&mes={$message}");
    }
}
