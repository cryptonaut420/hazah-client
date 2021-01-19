<?php

namespace Cryptonaut420\HazahClient\Events;

use App\Models\User;

class HazahUserSyncedEvent
{

    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

}
