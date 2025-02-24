<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Commission;

class CommissionPolicy
{

    public function view(User $user, Commission $commission)
    {
        return $user->id === $commission->artist_id || $user->id === $commission->client_id;
    }

    public function update(User $user, Commission $commission)
    {
        return $user->id === $commission->artist_id;
    }

}
