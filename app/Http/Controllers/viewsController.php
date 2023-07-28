<?php

namespace App\Http\Controllers;

use Storage;
use Validator;
use App\Models\User;
use App\Models\answer;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\askQuestionRequest;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Carbon;

class viewsController extends Controller
{
    public function questions () {
        return view('index',[
            'questions'=>question::withCount('views')->get(),
            'carbon' => Carbon::class, 
            'secondes'=> Carbon::parse(question::first()->created_at->format('d-n-Y-i-s'))->diffInSeconds(Carbon::now()),

        
            
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
            'urlImage'=>Storage::url(question::findOrFail($id)->image),
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
        $answer->comments()->create($valid->validated());
        return to_route('questions');
    }
    public function members () {
        return view('members',[
            'users'=>User::all()
        ]);
    }
    public function tags_php() {
        return view('tags.php',[
            'questions' => question::where('tags','=','php')->withCount('answers')->get(),          
        ]);
    }
    public function send_view (Request $request,$id) {
        $question = question::find($id);
        $validation = Validator::make(
            ['view' => $request->input('view')],
            ['view'=>['required'] ]
        );
        $view = $question->views()->create($validation->validated());
        return to_route('descriptions',$question->id);
    }
}
