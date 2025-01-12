<?php

namespace App\Models;

use App\Models\User;
use App\Models\QuestionLike;
use App\Models\QuestionSave;
use App\Models\QuestionComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(QuestionComment::class,'question_id','id');
    }

    public function likes(){
        return $this->hasMany(QuestionLike::class,'question_id','id');
    }

    public function saves(){
        return $this->hasMany(QuestionSave::class,'question_id','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'question_tags');
    }
}
