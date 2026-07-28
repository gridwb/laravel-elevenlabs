<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Contracts\Resources;

use Gridwb\LaravelElevenLabs\Responses\Tokens\TokenResponse;
use GuzzleHttp\Exception\GuzzleException;

interface TokensContract
{
    /**
     * @throws GuzzleException
     *
     * @see https://elevenlabs.io/docs/api-reference/tokens/create
     */
    public function createSingleUseToken(string $tokenType): TokenResponse;
}
