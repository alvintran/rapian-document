<?php

namespace Nht\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, User $member)
    {
        return true;
    }
}
