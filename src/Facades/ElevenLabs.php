<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Facades;

use Gridwb\LaravelElevenLabs\Contracts\Resources\ConversationsContract;
use Gridwb\LaravelElevenLabs\Contracts\Resources\TokensContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ConversationsContract conversations()
 * @method static TokensContract tokens()
 */
final class ElevenLabs extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'elevenlabs';
    }
}
