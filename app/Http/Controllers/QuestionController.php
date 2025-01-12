<?php

namespace App\Http\Controllers;

use App\Models\QuestionComment;
use Inertia\Inertia;
use App\Models\Question;
use App\Models\QuestionLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //index
    public function index()
    {
        $questions = Question::query()->with(['user', 'comments', 'likes', 'saves', 'tags'])
            ->orderBy("created_at", 'desc')
            ->paginate(2);
        foreach ($questions as $key => $question) {
            $questions[$key]->is_like = $this->likeDetail($question->id)['is_like'];
            $questions[$key]->likes_count = $this->likeDetail($question->id)['likes_count'];
        }
        // return $questions;


        return inertia("Question/Index", [
            'questions' => $questions,
            // 'comments'=>$comments
        ]);
    }

    // like detail
    protected function likeDetail($questionId)
    {
        $is_like = QuestionLike::where('question_id', $questionId)
            ->where('user_id', '=', Auth::user()->id)->first();

        $is_like = $is_like ? true : false;

        $likes_count = QuestionLike::where('question_id', $questionId)->count();

        $data["is_like"] = $is_like;
        $data['likes_count'] = $likes_count;
        return $data;
    }

    // create
    public function create()
    {
        return inertia('Question/Create');
    }

    // store
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|max:255',
            'user_id' => 'required',
            'slug' => 'required',
        ]);

        $question = Question::create($fields);

        return to_route('questions.index')->with('message', $question->title . ' has been created!');
    }

    // show
    public function show($id)
    {
        $comments =QuestionComment::with('user')->get() ;

        $question = Question::with('user', 'comments', 'likes', 'saves', 'tags')->findOrFail($id);
        return Inertia::render('Question/Show', [
            'question' => $question,
            'comments' =>$comments
        ]);
    }

    public function like($id)
    {
        $questionLike = QuestionLike::where('question_id', operator: $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if(!$questionLike){
            QuestionLike::updateOrCreate([
                'user_id' => auth()->user()->id,
                'question_id' => $id,
            ], [

            ]);
        }else{
            $questionLike->delete();
        }

        // return $questionLike;
        return back()->with('message', 'success!');

    }


}
