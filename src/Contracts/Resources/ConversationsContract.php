<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Contracts\Resources;

use Gridwb\LaravelElevenLabs\Responses\Conversations\AudioResponse;
use Gridwb\LaravelElevenLabs\Responses\Conversations\ConversationResponse;
use Gridwb\LaravelElevenLabs\Responses\Conversations\SignedUrlResponse;
use Gridwb\LaravelElevenLabs\Responses\Conversations\TokenResponse;
use GuzzleHttp\Exception\GuzzleException;

interface ConversationsContract
{
    /**
     * @throws GuzzleException
     *
     * @see https://elevenlabs.io/docs/api-reference/conversations/get
     */
    public function getDetails(string $conversationId): ConversationResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://elevenlabs.io/docs/api-reference/conversations/get-audio
     */
    public function getAudio(string $conversationId): AudioResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://elevenlabs.io/docs/api-reference/conversations/delete
     */
    public function delete(string $conversationId): void;

    /**
     * @throws GuzzleException
     *
     * @see https://elevenlabs.io/docs/api-reference/conversations/get-signed-url
     */
    public function getSignedUrl(string $agentId): SignedUrlResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://elevenlabs.io/docs/api-reference/conversations/get-webrtc-token
     */
    public function getToken(string $agentId): TokenResponse;
}
