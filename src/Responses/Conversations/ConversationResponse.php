<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Responses\Conversations;

use Gridwb\LaravelElevenLabs\Enums\Conversation\Status;
use Gridwb\LaravelElevenLabs\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class ConversationResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, ConversationResponseTranscript>  $transcript
     */
    public function __construct(
        #[MapInputName('agent_id')]
        #[MapOutputName('agent_id')]
        public string $agentId,
        #[MapInputName('conversation_id')]
        #[MapOutputName('conversation_id')]
        public string $conversationId,
        public Status $status,
        #[DataCollectionOf(ConversationResponseTranscript::class)]
        public Collection $transcript,
        public ConversationResponseMetadata $metadata,
        #[MapInputName('has_audio')]
        #[MapOutputName('has_audio')]
        public bool $hasAudio,
        #[MapInputName('has_user_audio')]
        #[MapOutputName('has_user_audio')]
        public bool $hasUserAudio,
        #[MapInputName('has_response_audio')]
        #[MapOutputName('has_response_audio')]
        public bool $hasResponseAudio,
    ) {}
}
