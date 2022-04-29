<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['topic', 'description'];

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
    }

    public function groupListens(): HasMany
    {
        return $this->hasMany(GroupListen::class);
    }

    public function studentListens(): HasMany
    {
        return $this->hasMany(StudentListen::class);
    }
}
