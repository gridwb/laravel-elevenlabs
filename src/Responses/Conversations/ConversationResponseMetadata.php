<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Responses\Conversations;

use Gridwb\LaravelElevenLabs\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class ConversationResponseMetadata extends AbstractResponse
{
    public function __construct(
        #[MapInputName('start_time_unix_secs')]
        #[MapOutputName('start_time_unix_secs')]
        public int $startTimeUnixSecs,
        #[MapInputName('call_duration_secs')]
        #[MapOutputName('call_duration_secs')]
        public int $callDurationSecs,
    ) {}
}
