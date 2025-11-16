## Overview

Laravel ElevenLabs is a convenient wrapper for interacting with the ElevenLabs API in Laravel applications.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
    - [Conversations Resource](#conversations-resource)
    - [Webhooks](#webhooks)
- [Testing](#testing)
- [Changelog](#changelog)
- [License](#license)

## Installation

1. Install the package
    ```bash
    composer require gridwb/laravel-elevenlabs
    ```

2. Publish the configuration file
    ```bash
    php artisan vendor:publish --tag="elevenlabs-config"
    ```

3. Add environment variables
    ```env
    ELEVENLABS_API_URL=https://api.elevenlabs.io
    ELEVENLABS_API_KEY=your-api-key-here
    ELEVENLABS_WEBHOOK_PATH=webhooks/elevenlabs
    ELEVENLABS_WEBHOOK_SECRET=your-webhook-secret-here
    ```

## Usage

### `Conversations` Resource

#### `get details`

Get conversation details request:

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$conversationId = '<string>';

$response = ElevenLabs::conversations()->getDetails($conversationId);

echo $response->agentId;
echo $response->conversationId;
echo $response->status->value;
// ...
```

#### `get audio`

Get conversation audio request:

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$conversationId = '<string>';

$response = ElevenLabs::conversations()->getAudio($conversationId);

echo $response->content; // md5
```

#### `delete`

Delete conversation request:

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$conversationId = '<string>';

ElevenLabs::conversations()->delete($conversationId);
```

#### `get signed url`

Get conversation signed url request:

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$agentId = '<string>';

$response = ElevenLabs::conversations()->getSignedUrl($agentId);

echo $response->signedUrl;
```

#### `get token`

Get conversation token request:

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$agentId = '<string>';

$response = ElevenLabs::conversations()->getToken($agentId);

echo $response->token;
```

### `Webhooks`

ElevenLabs can send events to your Laravel application via webhooks. By default, all webhook requests are dispatched to the
`Gridwb\LaravelElevenLabs\Jobs\ProcessWebhook::class` job, which triggers corresponding Laravel events. You can listen to
these events like any other Laravel event:

```php
<?php

use Gridwb\LaravelElevenLabs\Events\SubscriptionStarted;
use Illuminate\Support\Facades\Event;

Event::listen(PostCallTranscription::class, function (PostCallTranscription $event) {
    $payload = $event->payload;
    // Access data from ElevenLabs payload
});
```

If you need custom handling, you can define your own job and set it in the `config/elevenlabs.php`:

```php
<?php

return [
    'webhook' => [
        'process_webhook_job' => \Gridwb\LaravelElevenLabs\Jobs\ProcessWebhook::class,
    ],
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
