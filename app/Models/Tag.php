<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_tags');
    }

}
