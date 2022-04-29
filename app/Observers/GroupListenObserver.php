<?php

namespace App\Observers;

use App\Models\GroupListen;
use App\Models\StudentListen;
use Illuminate\Support\Facades\DB;

class GroupListenObserver
{
    /**
     * Handle the GroupListen "created" event.
     *
     * @param  \App\Models\GroupListen  $groupListen
     * @return void
     */
    public function created(GroupListen $groupListen)
    {
        DB::transaction(function () use ($groupListen) {
            $lecture = $groupListen->lecture;
            $group = $groupListen->group;
            foreach ($group->students as $student) {
                $studentListen = new StudentListen();
                $studentListen->lecture()->associate($lecture);
                $studentListen->student()->associate($student);
                $studentListen->save();
            }
        });
    }
}
