<?php

namespace App\Services;

use App\Models\Group;
use Illuminate\Support\Facades\DB;

class PlanService implements PlanServiceContract
{
    public function updateOrCreate(array $fields, Group $group): void
    {
        $lectures = collect($fields['lectures'])->unique()->mapWithKeys(function ($lecture_id, $index) {
            return [$lecture_id => ['sort' => $index]];
        });
        DB::transaction(function () use ($fields, $group, $lectures) {
            $plan = $group->plan()->updateOrCreate(['group_id' => $group->id], collect($fields)->only(['title'])->toArray());
            $plan->lectures()->sync($lectures);
            $group->plan_id = $plan->id;
            $plan->save();
            $group->save();
        });
    }
}
