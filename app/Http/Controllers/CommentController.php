<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\QuestionComment;
use Egulias\EmailValidator\Parser\Comment;

class CommentController extends Controller
{
    //all
    public function all(){
        $allComments = QuestionComment::query()->get();

    }

    //comments
    public function create($id){
        return Inertia::render('Comment/Index',[
            'questionId' =>$id,
        ]);
    }

    // comments store
}
