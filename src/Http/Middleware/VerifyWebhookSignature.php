<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

readonly class VerifyWebhookSignature
{
    public function handle(Request $request, Closure $next): Response
    {
        $this->verify($request);

        return $next($request);
    }

    private function verify(Request $request): void
    {
        /** @var string|null $signature */
        $signature = $request->header('elevenlabs-signature');

        if (is_null($signature)) {
            throw new AuthorizationException('Webhook signature is not provided.');
        }

        /** @var string|null $secret */
        $secret = Config::get('elevenlabs.webhook.secret');

        if (is_null($secret)) {
            throw new AuthorizationException('Webhook secret is not configured.');
        }

        $parts = explode(',', $signature);
        $timestamp = str_replace('t=', '', $parts[0]);
        $hmacSignature = str_replace('v0=', '', $parts[1]);

        if ((int) $timestamp < (time() - 30 * 60)) {
            return;
        }

        $hmac = hash_hmac(
            'sha256',
            "$timestamp.{$request->getContent()}",
            $secret
        );

        if (! hash_equals($hmacSignature, $hmac)) {
            throw new AuthorizationException('Verify webhook signature failed.');
        }
    }
}
