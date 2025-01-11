<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
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

    // create
    public function create(){
        return inertia('Question/Create');
    }

    // store
    public function store(Request $request){
        $fields = $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|max:255',
            'user_id'=>'required',
            'slug'=>'required',
        ]);

        $question = Question::create($fields);

        return to_route('questions.index')->with('message',$question->title .' has been created!');
    }

    // show
    public function show($id){

        $question = Question::with('user')->findOrFail($id);
        return Inertia::render('Question/Show',[
            'question'=>$question,
        ]);
    }
}
