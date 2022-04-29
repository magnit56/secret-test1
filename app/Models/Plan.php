<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function lectures(): BelongsToMany
    {
        return $this->belongsToMany(Lecture::class);
    }
}
