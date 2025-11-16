<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Events;

abstract readonly class AbstractEvent
{
    /**
     * @see https://elevenlabs.io/docs/product-guides/administration/webhooks#top-level-fields
     *
     * @var array<string, mixed>
     */
    public array $payload;

    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }
}
