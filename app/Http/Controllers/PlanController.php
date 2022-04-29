<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Models\Group;
use App\Services\PlanServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function store(StorePlanRequest $storePlanRequest, Group $group, PlanServiceContract $planService): string
    {
        try {
            $planService->updateOrCreate($storePlanRequest->validated(), $group);
            return 'success';
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
