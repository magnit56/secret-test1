<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Lecture;

interface ListenLectureServiceContract
{
    public function group(Lecture $lecture, Group $group);
}
