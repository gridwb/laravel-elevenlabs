<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Responses\Conversations;

use Gridwb\LaravelElevenLabs\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class SignedUrlResponse extends AbstractResponse
{
    public function __construct(
        #[MapInputName('signed_url')]
        #[MapOutputName('signed_url')]
        public string $signedUrl,
    ) {}
}
