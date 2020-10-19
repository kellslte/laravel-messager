<?php

namespace Maximof\LaravelMessager;

use Illuminate\Support\Facades\Http;

class LaravelMessager
{
    protected $token;
    protected $client;
    protected $error;
    protected $response;
    protected $to;
    protected $from;
    protected $text;
    protected $baseUrl;



    public function formatNumbers($numbers)
    {

        $formattedNumbers =  [];

        if (is_array($numbers)) {
            foreach($numbers as $number)
            {
                if (preg_match("[0-9+]", $number)) {
                    $formattedNumbers[] = $number;
                }
            }
        }

        return $formattedNumbers;
    }

    public function formatBody($text)
    {
        $text = strip_tags($text);

        return $text;
    }

    public function to($numbers)
    {
        $this->to = implode(",", $this->formatNumbers);

        return $this->to;
    }

    public function from($sender = null)
    {
        if (empty($sender)) {
            $this->from = config("laravel-messager.sender", 'Maximof');
        }
    }

    public function body($text)
    {
        $this->text = $this->formatBody($text);

        return $this->text;
    }

    public function response()
    {
        return $this->response;
    }
}
