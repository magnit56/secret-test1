<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\Resources\GroupCollection;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(): GroupCollection
    {
        return new GroupCollection(Group::all());
    }

    public function show(Group $group): GroupResource
    {
        return new GroupResource($group->load(['students', 'plan']));
    }

    public function store(StoreGroupRequest $storeGroupRequest): string
    {
        Group::create($storeGroupRequest->validated());
        return 'success';
    }

    public function update(UpdateGroupRequest $updateGroupRequest, Group $group): string
    {
        try {
            $group->updateOrFail($updateGroupRequest->validated());
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function destroy(Group $group): string
    {
        try {
            $group->deleteOrFail();
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }
}
