<?php

namespace App\Policies;

use App\User;
use App\ReadingRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReadingRecordPolicy
{
    use HandlesAuthorization;
    
    /**
     * Create a new policy instance.
     *
     * @return void
     */
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

    public function update_and_delete(User $user, ReadingRecord $reading_record)
    {
        return ($user->reader->id == $reading_record->reader_id);    
    }


}
