<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        return LectureResource::collection(Lecture::all());
    }

    public function show(Lecture $lecture)
    {
        return new LectureResource($lecture);
    }

    public function store(StoreLectureRequest $storeLectureRequest)
    {
        Lecture::create($storeLectureRequest->validated());
        return 'success';
    }

    public function update(UpdateLectureRequest $updateLectureRequest, Lecture $lecture)
    {
        $lecture->update($updateLectureRequest->validated());
        return 'success';
    }

    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return 'success';
    }
}
