<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function updated(User $user)
    {
        if ($user->is_artist && !$user->artistProfile) {
            $user->artistProfile()->create();
        }
    }
}
