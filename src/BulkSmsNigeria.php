<?php

namespace Maximof\LaravelMessager;

use Illuminate\Support\Facades\Http;
use Maximof\LaravelMessager\LaravelMessager as Messager;

class BulkSmsNigeria extends Messager
{

    public function __construct()
    {
        $this->baseUrl = "https://www.bulksmsnigeria.com/api/v1/sms/create";

        $this->token = config("laravel-messager.bulk_sms_nigeria.api_token");
    }

    public function send()
    {
        $this->client = Http::post($this->baseUrl, [
            "api_token" => $this->token,
            "from" => $this->from,
            "to" => $this->to,
            "body" => $this->text
        ]);

        $this->response = $this->client->json();

        if ($this->client->status() == 200) {
            return true;
        }else {
            return $this->client->throw();
        }
    }
}

