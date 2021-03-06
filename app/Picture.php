<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{

    protected $fillable = ['link', 'title'];
    
    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
