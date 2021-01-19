<?php

namespace Tokenly\HazahClient\Events;

use App\Models\User;

class HazahUserCreatedEvent
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
