<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return GroupResource::collection(Group::all());
    }

    public function show(Group $group)
    {
        return new GroupResource($group);
    }

    public function store(StoreGroupRequest $storeGroupRequest)
    {
        Group::create($storeGroupRequest->validated());
        return 'success';
    }

    public function update(UpdateGroupRequest $updateGroupRequest, Group $group)
    {
        $group->update($updateGroupRequest->validated());
        return 'success';
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return 'success';
    }
}
