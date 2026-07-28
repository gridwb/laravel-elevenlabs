<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Resources;

use Gridwb\LaravelElevenLabs\Contracts\ApiClientContract;
use Gridwb\LaravelElevenLabs\Contracts\Resources\TokensContract;
use Gridwb\LaravelElevenLabs\Responses\Tokens\TokenResponse;
use Symfony\Component\HttpFoundation\Request;

readonly class Tokens implements TokensContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function createSingleUseToken(string $tokenType): TokenResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_POST,
            "v1/single-use-token/$tokenType"
        );

        return TokenResponse::fromResponse($response);
    }
}
