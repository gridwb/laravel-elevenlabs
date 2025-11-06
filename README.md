## Overview

Laravel ElevenLabs is a convenient wrapper for interacting with the ElevenLabs API in Laravel applications.

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
    ```bash
    ELEVENLABS_API_URL=https://api.elevenlabs.io
    ELEVENLABS_API_KEY=your-api-key-here
    ```

## Usage

Get conversation details

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$conversationId = 'conv_12345';
$conversationData = ElevenLabs::conversations()->getDetails($conversationId);

```

Get conversation audio

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$conversationId = 'conv_12345';
$audioData = ElevenLabs::conversations()->getAudio($conversationId);

```

Delete conversation

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$conversationId = 'conv_12345';
ElevenLabs::conversations()->delete($conversationId);

```

Get conversation signed url

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$agentId = 'agent_12345';
$signedUrlData = ElevenLabs::conversations()->getSignedUrl($agentId);

```

Get conversation token

```php
<?php

use Gridwb\LaravelElevenLabs\Facades\ElevenLabs;

$agentId = 'agent_12345';
$tokenData = ElevenLabs::conversations()->getToken($agentId);

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
