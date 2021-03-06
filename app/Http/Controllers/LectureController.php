<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Http\Resources\LectureCollection;
use App\Http\Resources\LectureResource;
use App\Models\Group;
use App\Models\Lecture;
use App\Services\ListenLectureServiceContract;

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

    public function destroy(Lecture $lecture): string
    {
        try {
            $lecture->deleteOrFail();
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function listen(Lecture $lecture, Group $group, ListenLectureServiceContract $listenLectureService): string
    {
        try {
            $listenLectureService->group($lecture, $group);
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }
}
