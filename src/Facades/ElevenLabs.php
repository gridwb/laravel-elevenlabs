<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Facades;

use Gridwb\LaravelElevenLabs\Contracts\Resources\ConversationsContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ConversationsContract conversations()
 */
final class ElevenLabs extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'elevenlabs';
    }
}
