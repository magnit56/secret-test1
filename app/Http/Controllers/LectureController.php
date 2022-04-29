<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Http\Resources\LectureCollection;
use App\Http\Resources\LectureResource;
use App\Models\Group;
use App\Models\GroupListen;
use App\Models\Lecture;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LectureController extends Controller
{
    public function index(): LectureCollection
    {
        return new LectureCollection(Lecture::all());
    }

    public function show(Lecture $lecture): LectureResource
    {
        return new LectureResource($lecture);
    }

    public function store(StoreLectureRequest $storeLectureRequest): string
    {
        Lecture::create($storeLectureRequest->validated());
        return 'success';
    }

    public function update(UpdateLectureRequest $updateLectureRequest, Lecture $lecture): string
    {
        try {
            $lecture->updateOrFail($updateLectureRequest->validated());
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function destroy(Lecture $lecture)
    {
        try {
            $lecture->deleteOrFail();
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function listen(Lecture $lecture, Group $group): string
    {
        try {
            $groupListen = new GroupListen();
            $groupListen->lecture()->associate($lecture);
            $groupListen->group()->associate($group);
            $groupListen->saveOrFail();
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }
}
