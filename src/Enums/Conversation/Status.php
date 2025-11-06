<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Enums\Conversation;

enum Status: string
{
    case INITIATED = 'initiated';
    case IN_PROGRESS = 'in-progress';
    case PROCESSING = 'processing';
    case DONE = 'done';
    case FAILED = 'failed';
}
