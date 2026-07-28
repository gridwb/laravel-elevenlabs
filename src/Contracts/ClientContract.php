<?php

declare(strict_types=1);

namespace Gridwb\LaravelElevenLabs\Contracts;

use Gridwb\LaravelElevenLabs\Contracts\Resources\ConversationsContract;
use Gridwb\LaravelElevenLabs\Contracts\Resources\TokensContract;

interface ClientContract
{
    public function conversations(): ConversationsContract;

    public function tokens(): TokensContract;
}
