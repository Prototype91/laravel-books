<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{

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
}
