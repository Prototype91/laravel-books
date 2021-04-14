<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    protected $fillable = [
        'title', 'description', 'genre_id', 'status'
    ];

    public function setGenreIdAttribute(int $value)
    {
        if ($value == 0) {
            $this->attributes['genre_id'] = null;
        } else {
            $this->attributes['genre_id'] = $value;
        }
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function picture(): HasOne
    {
        return $this->hasOne(Picture::class);
    }

    public function scopePublished($query){
        return $query->where('status', 'published');
    }
}
