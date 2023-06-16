<?php

namespace App\Http\Controllers;

use App\Http\Requests\askQuestionRequest;
use App\Models\answer;
use App\Models\question;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;
use Symfony\Component\Console\Input\Input;
use Validator;
use Illuminate\Support\Facades\Auth;

class viewsController extends Controller
{
    public function questions () {
        return view('index',[
            'questions'=>question::all(),
        ]);
    }
    public function ask () {
        return view('ask');
    }
    public function descriptions ($id) {
        return view('description',[
            'question'=>question::findOrFail($id),
            'urlImage'=>Storage::url(question::findOrFail($id)->image),
            'answer'=>answer::find($id),
        ]);
    }
    public function answer ($id) {
        return view('answer',[
            'question'=>question::findOrFail($id),
            'urlImage'=>Storage::url(question::findOrFail($id)->image)
        ]);
    }
    public function send_question (askQuestionRequest $request) {
        $question =$request->validated();
        if($request->validated('image')!==null && !$request->validated('image')->getError()){
            $question['image'] = $request->validated('image')->store('q-illustration','public');
        }
        $question['user_id'] = Auth::user()->getAuthIdentifier();
        question::create($question);
        return to_route('questions');
    }
    public function send_answer (Request $request,$id) {
        $valid = Validator::make([
            'content'=> $request->input('answer'),
        ],[
            'content' => ['required','unique:answers'],
        ]);
        $question = question::find($id);
        $question->answers()->create($valid->validated());
        return to_route('questions');
    }
    public function comments (Request $request,$id) {
        $valid = Validator::make([
            'comment'=> $request->input('comment'),
        ],[
            'comment' => ['required','unique:comments'],
        ]);
        $question = question::find($id);
        $answer = answer::find($id);
        dd($answer);
        $answer->comments()->create($valid->validated());
        return to_route('questions');
    }
}
