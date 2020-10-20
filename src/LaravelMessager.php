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
    protected $receivers = [];
    protected $from;
    protected $text;
    protected $baseUrl;



    public function formatNumbers($number)
    {
        $number = (string) $number;
        $number = trim($number);
        $number = preg_replace("/\s|\+|-/", '', $number);

        return $number;
    }

    public function formatBody($text)
    {
        $text = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', strip_tags(trim($text)));

        return $text;
    }

    public function to($numbers)
    {
        $numbers = is_array($numbers) ? $numbers : func_get_args();

        if (count($numbers)) {
            foreach ($numbers as $number) {
                $this->receivers[] = $this->formatNumbers($number);
            }
        }

        return $this->setReceivers();
    }

    private function setReceivers()
    {
        $this->to = implode(",", $this->receivers);
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
