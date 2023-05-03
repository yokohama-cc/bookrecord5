<?php

namespace App\Policies;

use App\Reader;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReaderPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }
    public function before($user, $ability)
    {
        if ($user->isSystemAdmin()) {
            return true;
        }
    }
    
    public function update_and_delete(User $user, Reader $reader)
    {
        return ($user->reader->id == $reader->id);
    }
}
