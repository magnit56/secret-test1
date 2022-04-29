<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'group_id'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function studentListens(): HasMany
    {
        return $this->hasMany(StudentListen::class);
    }
}
