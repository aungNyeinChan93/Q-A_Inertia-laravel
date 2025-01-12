<?php

namespace App\Http\Controllers;

use App\Models\QuestionComment;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //all
    public function all(){
        $allComments = QuestionComment::query()->get();
        
    }
}
