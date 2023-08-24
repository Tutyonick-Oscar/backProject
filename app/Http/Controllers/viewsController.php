<?php

namespace App\Http\Controllers;

use App\Events\searchRequestEvent;
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
    public function questions (Request $request) {
        $found ='';
        if ($request->has('search')) {
            event(new searchRequestEvent($request->filled('search'),$request->search)); 
        }
             
        // if ($request->filled('search')) {
        //     $found =question::search($request->search)->get();
        // }
        return view('index',[
            'questions'=>question::withCount('views')->get(),
            'carbon' => Carbon::class,
            'found' =>$found   
        ]);
    }
    public function ask (Request $request) {
        $found ='';
        if ($request->filled('search')) {
            $found =question::search($request->search)->get();
        }
        return view('ask',['found'=> $found]);
    }
    public function descriptions ($id, Request $request) {
        $found ='';
        if ($request->filled('search')) {
            $found =question::search($request->search)->get();
        }
        return view('description',[
            'question'=>question::findOrFail($id),
            'urlImage'=>Storage::url(question::findOrFail($id)->image),
            'answer'=>answer::find($id),
            'found'=>$found,
        ]);
    }
    public function answer ($id, Request $request) {
        $found ='';
        if ($request->filled('search')) {
            $found =question::search($request->search)->get();
        }
        return view('answer',[
            'question'=>question::findOrFail($id),
            'urlImage'=>Storage::url(question::findOrFail($id)->image),
            'found' =>$found
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
    public function members (Request $request) {
        $found ='';
        if ($request->filled('search')) {
            $found =question::search($request->search)->get();
        }
        return view('members',[
            'users'=>User::all(),
            'found'=>$found,
        ]);
    }
    public function tags_php(Request $request) {
        $found ='';
        if ($request->filled('search')) {
            $found =question::search($request->search)->get();
        }
        return view('tags.php',[
            'questions' => question::where('tags','=','php')->withCount('answers')->get(), 
            'found' =>$found         
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
