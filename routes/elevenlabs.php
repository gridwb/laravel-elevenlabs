<?php

use Gridwb\LaravelElevenLabs\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::middleware(Config::get('elevenlabs.webhook.middleware'))
    ->post(Config::get('elevenlabs.webhook.path'), WebhookController::class);
