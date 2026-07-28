<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Responses\Tokens;

use Gridwb\LaravelElevenLabs\Responses\AbstractResponse;

class TokenResponse extends AbstractResponse
{
    public function __construct(
        public string $token,
    ) {}
}
