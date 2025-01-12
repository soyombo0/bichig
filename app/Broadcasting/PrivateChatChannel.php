<?php

namespace App\Broadcasting;

use App\Models\PrivateChat;
use App\Models\User;

class PrivateChatChannel
{
    private User $firstUser;
    private User $secondUser;

    /**
     * Create a new channel instance.
     */
    public function __construct(User $firstUser, User $secondUser)
    {
        $this->firstUser = $firstUser;
        $this->secondUser = $secondUser;
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user): array|bool
    {
        return $user->id === $this->firstUser->id || $user->id === $this->secondUser->id;
    }

    public function broadcastOn()
    {
        return [
            new PrivateChatChannel($this->firstUser, $this->secondUser)
        ];
    }

    public function broadcastAs()
    {
        return 'private-channel';
    }
}
