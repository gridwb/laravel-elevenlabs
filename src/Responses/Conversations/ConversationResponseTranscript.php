<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Responses\Conversations;

use Gridwb\LaravelElevenLabs\Enums\Conversation\Agent\Role;
use Gridwb\LaravelElevenLabs\Responses\AbstractResponse;

class ConversationResponseTranscript extends AbstractResponse
{
    public function __construct(
        public Role $role,
        public ?string $message,
    ) {}
}
