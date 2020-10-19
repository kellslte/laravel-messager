<?php

namespace Maximof\LaravelMessager;

use Illuminate\Support\Facades\Http;
use Maximof\LaravelMessager\LaravelMessager as Messager;

class SmartSmsSolutions extends Messager
{
    private $type;
    private $routing;
    private $balanceUrl;

    public function __construct()
    {
        $this->baseUrl = "https://smartsmssolutions.com/api/json.php?";

        $this->token = config("laravel-messager.smart_sms.token");

        $this->type = config('laravel-messager.smart_sms.type');

        $this->routing = config('laravel-messager.smart_sms.routing');

        $this->balanceUrl = "https://smartsmssolutions.com/api/?";
    }


    public function send()
    {
        $this->client = Http::get($this->baseUrl, [
            "sender" => $this->from,
            "to" => $this->to,
            "message" => $this->text,
            "type" => $this->type,
            "routing" => $this->routing,
            "token" => $this->token
        ]);

        $this->response = $this->client->json();

        if ($this->client->status() == 200) {
            return true;
        }else {
            return $this->client->throw();
        }
    }

    public function balance()
    {
        $this->client = Http::get($this->balanceUrl, [
            "checkbalance" => 1,
            "token" => $this->token
        ]);

        $this->response = $this->client->json();

        return $this->response;
    }
}

