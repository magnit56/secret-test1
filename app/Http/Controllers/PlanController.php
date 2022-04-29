<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function store(StorePlanRequest $storePlanRequest, Group $group): string
    {
        try {
            $lectures = collect($storePlanRequest->validated('lectures'))->unique()->mapWithKeys(function ($lecture_id, $index) {
                return [$lecture_id => ['sort' => $index]];
            });
            return DB::transaction(function () use ($storePlanRequest, $group, $lectures) {
                $plan = $group->plan()->updateOrCreate(['group_id' => $group->id], $storePlanRequest->safe()->only(['title']));
                $plan->lectures()->sync($lectures);
                $group->plan_id = $plan->id;
                $plan->save();
                $group->save();
                return 'success';
            });
        } catch (\Exception) {
            return 'error';
        }
    }

    public function show(Group $group): PlanResource|string
    {
        if ($group->plan()->exists()) {
            return new PlanResource($group->plan);
        }
        return 'error';
    }
}
