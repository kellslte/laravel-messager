# Laravel Messager

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

This is a wrapper for a few sms service providers in Nigeria. This package is meant just for laravel so feel free to install in your app to extend its capablilities. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require maximof/laravel-messager
```

## Usage


This is a fairly easy package to implement. This package works strictly on Laravel 7 and upwards.
As Laravel implements package autodiscovery from Laravel 5+ you do not need to add the provider to
Laravel's provider array. Publish the config file by running

``` php
$ php artisan vendor:publish --provider="Maximof\LaravelMessager\LaravelMessagerServiceProvider"
```
 
After you have published the config file, set your environmental variables.

| Variable | Description |
| ----------- | ----------- |
| SMS_SENDER |  set the sms sender |
| BULK_SMS_NIGERIA_TOKEN | set the bulk sms Nigeria api token |
| SMART_SMS_SOLUTIONS_TOKEN | set the smart sms solutions api token |

To generate an API token, for Smart sms solutions visit this [link](https://smartsmssolutions.com/sms/api-x-tokens), you can do this only after registering on their site [here](https://smartsmssolutions.com/register).

To generate an API for Bulk sms Nigeria visit this [link](https://smartsmssolutions.com/register). Remember also to register [here](https://smartsmssolutions.com) 

Only two service providers have been implemented in this package

| Service Provider | Description |
| ----------------- | ----------- |
| Smartsmssolutions API | this is the API for www.smartsmssolutions.com. To get an api token head to [Smart Sms Solutions](https://www.smartsmssolutions.com) to get one |
| Bulksmsnigeria API | this is the API for www.bulksmsnigeria.com. To understand how the process works on their end head over to [Bulk Sms Nigeria](www.bulksmsnigeria.com) |

To send messages you can just pull in the class in your code like this

``` php
$sms  = new BulkSmsNigeria();

$sms->to(08105612094)->from("Maximof")->body("Hello!");

//this will return a true value if the message is successfully sent or will throw an exception if an error occurs
```

To check your sms units balance 

``` php
$sms = new SmartSmsSolution();
$sms->balance();
//this returns a string containing the sms units balance
//this only works for the SmartSmsSolutions class as the BulkSmsNigeria class api has no balance checking endpoint
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email favourmaxoti@outlook.com instead of using the issue tracker.

## Credits

- [Favour Max-Oti][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/maximof/laravel-messager.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/maximof/laravel-messager.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/maximof/laravel-messager/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/maximof/laravel-messager
[link-downloads]: https://packagist.org/packages/maximof/laravel-messager
[link-travis]: https://travis-ci.org/maximof/laravel-messager
[link-author]: https://github.com/maximof
[link-contributors]: ../../contributors
