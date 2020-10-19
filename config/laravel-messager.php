<?php

return [
    "sender" => env("SMS_SENDER", "Maximof"),
    "bulk_sms_nigeria" => [
        "api_token" => env("BULK_SMS_NIGERIA_TOKEN"),
        "dnd" => env("BULK_SMS_NIGERIA_DND", 2)
    ],
    "smart_sms" => [
        "token" => env("SMRT_SMS_SOLUTIONS_TOKEN"),
        "type" => 0,
        "routing" => env("SMART_SMS_ROUTE", 2)
    ]
];
