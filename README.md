# Laravel Serper Package README

## Introduction

The Laravel Serper package is a simple, efficient wrapper around the [Serper.dev API](https://serper.dev/), designed to integrate seamlessly with Laravel applications. It provides a fluent, expressive interface to perform searches and retrieve news results from Google via Serper.dev, making it easier for developers to include search functionalities in their Laravel applications.

## Features

- Easy-to-use facade for performing searches and retrieving news results.
- Support for single and multiple queries with customizable parameters.
- Integration with Laravel's service container for easy configuration and extension.
- Utilizes GuzzleHttp for efficient HTTP requests.
- Includes a suite of unit tests for reliability and maintainability.

## Installation

To install the Laravel Serper package, run the following command in your terminal:

```bash
composer require gregpriday/laravel-serper
```

After installation, publish the package's configuration file by running:

```bash
php artisan vendor:publish --provider="GregPriday\LaravelSerper\SerperServiceProvider"
```

## Configuration

Before using the Serper package, you must obtain an API key from Serper.dev and add it to your `.env` file:

```plaintext
SERPER_API_KEY=your_serper_dev_api_key
```

Then, configure your API key in the `config/serper.php` configuration file:

```php
return [
    'key' => env('SERPER_API_KEY', ''),
];
```

## Usage

The Laravel Serper package provides a simple API to perform search and news queries. Here's how you can use it:

### Performing a Search

To perform a search, use the `Serper::search` method:

```php
use GregPriday\LaravelSerper\Facades\Serper;

$results = Serper::search('Laravel');
```

### Retrieving News Results

To retrieve news results, specify the type as 'news' in the `search` method:

```php
$newsResults = Serper::search('Laravel', 10, 'news');
```

### Performing Multiple Searches

To perform multiple searches at once, use the `Serper::searchMulti` method:

```php
$queries = ['Laravel', 'PHP'];
$results = Serper::searchMulti($queries, 10, 'search');
```

## Extending

The package is designed to be easily extendable. You can extend or override the functionality by creating your own implementations and binding them to the service container in a service provider.

## Testing

This package comes with a suite of PHPUnit tests. To run the tests, use the following command:

```bash
vendor/bin/pest
```

## Contribution

Contributions are welcome! Please feel free to submit pull requests or open issues on the GitHub repository.

## License

The Laravel Serper package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
