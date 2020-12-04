<?php

namespace App\Http\Controllers\perticipant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perticipant;
use App\Teacher;
use App\VoteTopic;
use App\Poll;
use App\VoteResultSheet;
use Illuminate\Support\Facades\Auth;
class PerticipantController extends Controller
{
    public function __construct(){
        $this->middleware('auth:perticipant');
        if(!is_dir(public_path('/upload'))){
            $this->makeDir(public_path('/upload'));
        }
    }

    public function index(){
        if(Poll::where('is_published','1')->get()->isNotEmpty()){
            $poll = Poll::where('is_published','1')->first();
            $is_published = 1;
        }else{
            $poll = [];
            $is_published = 0;
        }



        $department = Auth::user()->department;
        if($department == 'science'){
            $teachers = Teacher::where('sector','science')->get();
        }
        if($department == 'commerce'){
            $teachers = Teacher::where('sector','commerce')->get();
        }
        if($department == 'arts'){
            $teachers = Teacher::where('sector','arts')->get();
        }
        
        $topics = VoteTopic::all();
        return view('perticipant.vote.voteSection',compact('teachers'),compact('topics'))->with(['poll' => $poll,'is_published'=>$is_published]);
    }

    public function vote_submit(Request $request ){
        $poll_id = decrypt($request->pold);
        $teacher_id = decrypt($request->tead);
        $topic_id = decrypt($request->topd);
        $vote_mark = $request->vote;
        $user_id = Auth::user()->id;
        if(Poll::where('is_published','1')->get()->isNotEmpty()){
            if(VoteResultSheet::where('poll_id',$poll_id)->
                where('perticipant_id',$user_id)
                ->where('teacher_id',$teacher_id)
                ->where('topic_id',$topic_id)->get()->isEmpty())
            {
                $resultSheet = VoteResultSheet::create([
                    'poll_id' => $poll_id,
                    'perticipant_id' => $user_id,
                    'teacher_id' => $teacher_id,
                    'topic_id' => $topic_id,
                    'point' => $vote_mark,
                ]);
                if(Auth::user()->is_voted == 0){
                    $perticipant = Perticipant::findOrFail(Auth::user()->id);
                    $perticipant->is_voted = 1;
                    $perticipant->save();
                }
                return json_encode(['success'=>'voted successfully!']);

            }

        }

    }
}
