<?php

namespace App\Services;

use App\Models\Group;

interface PlanServiceContract
{
    public function updateOrCreate(array $fields, Group $group): void;
}
