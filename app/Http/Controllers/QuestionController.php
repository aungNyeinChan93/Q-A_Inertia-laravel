<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //index
    public function index()
    {
        $questions = Question::query()->with('user')
            ->orderBy("created_at", 'desc')
            ->paginate(2);
        return inertia("Question/Index", [
            'questions' => $questions,
        ]);
    }
}
