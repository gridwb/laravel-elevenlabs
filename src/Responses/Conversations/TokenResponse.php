<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Responses\Conversations;

use Gridwb\LaravelElevenLabs\Responses\AbstractResponse;

class TokenResponse extends AbstractResponse
{
    public function __construct(
        public string $token,
    ) {}
}
