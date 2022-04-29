<?php

namespace App\Services;

use App\Models\Group;
use App\Models\GroupListen;
use App\Models\Lecture;

class ListenLectureService implements ListenLectureServiceContract
{
    public function group(Lecture $lecture, Group $group): void
    {
        $groupListen = new GroupListen();
        $groupListen->lecture()->associate($lecture);
        $groupListen->group()->associate($group);
        $groupListen->saveOrFail();
    }
}
