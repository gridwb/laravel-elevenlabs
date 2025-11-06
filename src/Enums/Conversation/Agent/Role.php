<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Enums\Conversation\Agent;

enum Role: string
{
    case AGENT = 'agent';
    case USER = 'user';
}
