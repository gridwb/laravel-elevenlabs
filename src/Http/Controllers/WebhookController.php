<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Http\Controllers;

use Gridwb\LaravelElevenLabs\Jobs\ProcessWebhook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class WebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        /** @var class-string<ProcessWebhook>|null $job */
        $job = Config::get('elevenlabs.webhook.process_webhook_job');

        if ($job) {
            $data = $request->except([
                'data.full_audio',
            ]);

            dispatch(new $job($data));
        }

        return Response::json(['status' => true]);
    }
}
