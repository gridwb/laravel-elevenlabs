<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Contracts;

use Gridwb\LaravelElevenLabs\Contracts\Resources\ConversationsContract;

interface ClientContract
{
    public function conversations(): ConversationsContract;
}
