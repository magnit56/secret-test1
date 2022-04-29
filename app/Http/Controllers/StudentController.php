<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): StudentCollection
    {
        return new StudentCollection(Student::all());
    }

    public function show(Student $student): StudentResource
    {
        return new StudentResource($student);
    }

    public function store(StoreStudentRequest $storeStudentRequest): string
    {
        Student::create($storeStudentRequest->validated());
        return 'success';
    }

    public function update(UpdateStudentRequest $updateStudentRequest, Student $student): string
    {
        try {
            $student->updateOrFail($updateStudentRequest->validated());
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function destroy(Student $student): string
    {
        try {
            $student->deleteOrFail();
            return 'success';
        } catch (\Throwable $e) {
            return 'error';
        }
    }
}
