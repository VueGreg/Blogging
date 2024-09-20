<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posts extends Model
{
    use HasFactory;

    public function category() : BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Comments() : HasMany
    {
        return $this->hasMany(Comments::class, 'post_id');
    }

    public function tags() : BelongsToMany
    {
        //dd($this->belongsToMany(Tags::class));
        return $this->belongsToMany(Tags::class);
    }
}
