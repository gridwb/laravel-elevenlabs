<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Resources;

use Gridwb\LaravelElevenLabs\Contracts\ApiClientContract;
use Gridwb\LaravelElevenLabs\Contracts\Resources\ConversationsContract;
use Gridwb\LaravelElevenLabs\Responses\Conversations\AudioResponse;
use Gridwb\LaravelElevenLabs\Responses\Conversations\ConversationResponse;
use Gridwb\LaravelElevenLabs\Responses\Conversations\SignedUrlResponse;
use Gridwb\LaravelElevenLabs\Responses\Conversations\TokenResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Conversations implements ConversationsContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function getDetails(string $conversationId): ConversationResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_GET,
            "v1/convai/conversations/$conversationId"
        );

        return ConversationResponse::fromResponse($response);
    }

    public function getAudio(string $conversationId): AudioResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_GET,
            "v1/convai/conversations/$conversationId/audio"
        );

        return AudioResponse::fromResponse($response);
    }

    public function delete(string $conversationId): void
    {
        $this->apiClient->request(
            Request::METHOD_DELETE,
            "v1/convai/conversations/$conversationId"
        );
    }

    public function getSignedUrl(string $agentId): SignedUrlResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_GET,
            'v1/convai/conversation/get-signed-url',
            [
                RequestOptions::QUERY => [
                    'agent_id' => $agentId,
                ],
            ]
        );

        return SignedUrlResponse::fromResponse($response);
    }

    public function getToken(string $agentId): TokenResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_GET,
            'v1/convai/conversation/token',
            [
                RequestOptions::QUERY => [
                    'agent_id' => $agentId,
                ],
            ]
        );

        return TokenResponse::fromResponse($response);
    }
}
