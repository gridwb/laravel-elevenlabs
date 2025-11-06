<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Responses\Conversations;

use Gridwb\LaravelElevenLabs\Responses\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

class AudioResponse extends AbstractResponse
{
    public function __construct(
        public string $content,
    ) {}

    public static function fromResponse(ResponseInterface $response): static
    {
        return static::from([
            'content' => $response->getBody()->getContents(),
        ]);
    }
}
