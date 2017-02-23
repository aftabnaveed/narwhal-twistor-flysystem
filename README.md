# Narwhal Twistor Flysystem HTTP Adapter Provider

Narwal Twistor Flysystem HTTP adapter is to add laraval and lumen support for the adapter.

## Installation
```bash
composer require narwahl/twistor-flysystem-http
```

## Usage Lumen 5.4
Add this to your bootstrap/app.php
```php
$app->register(Narwhal\Twistor\Flysystem\TwistorFlysystemHttpProvider::class);
```

Options and context can be added inside config/filesystem.php

```php
'http' => [
            'driver' => 'http',
            'baseurl' => 'https://example.com/',
            'supportsHead' => false,
            'context' => [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]
        ]
```

To download a file just use this Lumen provider

```php
 $content = Storage::disk('http')->get('test.csv');
```

## Laraval 5.4
coming....