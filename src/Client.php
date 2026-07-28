<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs;

use Gridwb\LaravelElevenLabs\Contracts\ApiClientContract;
use Gridwb\LaravelElevenLabs\Contracts\ClientContract;
use Gridwb\LaravelElevenLabs\Resources\Conversations;
use Gridwb\LaravelElevenLabs\Resources\Tokens;

readonly class Client implements ClientContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function conversations(): Conversations
    {
        return new Conversations($this->apiClient);
    }

    public function tokens(): Tokens
    {
        return new Tokens($this->apiClient);
    }
}
