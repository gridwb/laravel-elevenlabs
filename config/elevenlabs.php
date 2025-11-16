<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ElevenLabs API url
    |--------------------------------------------------------------------------
    */

    'api_url' => env('ELEVENLABS_API_URL', 'https://api.elevenlabs.io'),

    /*
    |--------------------------------------------------------------------------
    | ElevenLabs API key
    |--------------------------------------------------------------------------
    */

    'api_key' => env('ELEVENLABS_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | ElevenLabs Webhook
    |--------------------------------------------------------------------------
    |
    | @see https://elevenlabs.io/docs/agents-platform/workflows/post-call-webhooks
    |
    */

    'webhook' => [
        /*
        |--------------------------------------------------------------------------
        | Webhook Path
        |--------------------------------------------------------------------------
        |
        | The URI path where ElevenLabs will send webhook POST requests.
        |
        */

        'path' => env('ELEVENLABS_WEBHOOK_PATH', 'webhooks/elevenlabs'),

        /*
        |--------------------------------------------------------------------------
        | Webhook Secret
        |--------------------------------------------------------------------------
        |
        | A secret token used to verify incoming webhook requests.
        |
        */

        'secret' => env('ELEVENLABS_WEBHOOK_SECRET'),

        /*
        |--------------------------------------------------------------------------
        | Middleware
        |--------------------------------------------------------------------------
        |
        | Optional middleware to run before processing the webhook.
        |
        */

        'middleware' => [
            \Gridwb\LaravelElevenLabs\Http\Middleware\VerifyWebhookSignature::class,
        ],

        /*
        |--------------------------------------------------------------------------
        | Webhook Processing Job
        |--------------------------------------------------------------------------
        |
        | The job class that handles processing of incoming webhook payloads.
        | The class must extend Gridwb\LaravelElevenLabs\Jobs\ProcessWebhook.
        |
        */

        'process_webhook_job' => \Gridwb\LaravelElevenLabs\Jobs\ProcessWebhook::class,

        /*
        |--------------------------------------------------------------------------
        | Event Mapping
        |--------------------------------------------------------------------------
        |
        | Map ElevenLabs webhook "type" values to Laravel event classes.
        | @see https://elevenlabs.io/docs/agents-platform/workflows/post-call-webhooks
        | Each class must extend Gridwb\LaravelElevenLabs\Events\AbstractEvent.
        |
        */

        'events' => [
            'post_call_transcription' => \Gridwb\LaravelElevenLabs\Events\PostCallTranscription::class,
            'post_call_audio' => \Gridwb\LaravelElevenLabs\Events\PostCallAudio::class,
            'call_initiation_failure' => \Gridwb\LaravelElevenLabs\Events\CallInitiationFailure::class,
        ],
    ],

];
