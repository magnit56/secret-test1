<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return StudentResource::collection(Student::all());
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function store(StoreStudentRequest $storeStudentRequest)
    {
        Student::create($storeStudentRequest->validated());
        return 'success';
    }

    public function update(UpdateStudentRequest $updateStudentRequest, Student $student)
    {
        $student->update($updateStudentRequest->validated());
        return 'success';
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return 'success';
    }
}
