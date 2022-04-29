<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'plan_id'];

    public function plan(): HasOne
    {
        return $this->hasOne(Plan::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function groupListen(): HasMany
    {
        return $this->hasMany(GroupListen::class);
    }
}
