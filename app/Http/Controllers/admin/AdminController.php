<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perticipant;
use App\Poll;
use App\Teacher;
use App\VoteTopic;
use App\VoteResultSheet;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
//export data to excel//
use App\Exports\PerticipantsExport;
use Maatwebsite\Excel\Facades\Excel;
//export data to excel xx//
use Illuminate\Support\Facades\File; 
class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
        if(!is_dir(public_path('/upload'))){
            $this->makeDir(public_path('/upload'));
        }
    }

    public $top_10_result;

    public function alphaNumeric(){
        // Available alpha caracters
        $characters = 'ABCDDFGHIJKLMNOPQRSTUVWXYZ';
        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(10000, 99999)
            . mt_rand(100000, 999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        return $string = str_shuffle($pin);
    }

    public function makeDir($file){
        if(!is_dir(public_path($file))){
            mkdir(public_path($file),0777);
        }
    }


    public function poll_index(){
        $polls = Poll::all();
        return view('admin.poll.polls',compact('polls'))->with(['navPoll'=>'active']);;
    }

    public function add_poll(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'perticipants' => 'required'
        ]);

        $poll = new Poll;
        $poll->name = $request->name;
        $poll->save();

        for($i=0; $i < $request->perticipants ;  $i++){
            $code = $this->alphaNumeric();
            $perticipant = new Perticipant;
            $perticipant->code = $code;
            $perticipant->poll_id = $poll->id;
            $perticipant->save();
        }

        return back()->with('success','poll created successfully!!');


        

    }

    public function perticipant_export($id,$name){
        $poll_id = decrypt($id);
        return Excel::download(new PerticipantsExport($poll_id), $name.'.xlsx');

    }

    public function poll_delete(Request $request){
        $poll = Poll::findOrFail(decrypt($request->id));
        $perticipants = Perticipant::where('poll_id',$poll->id)->get();
        
        foreach( $perticipants as $item){
            $item->delete();
        }
        $poll->delete();
        return back()->with('success','poll deleted successfully!!');
    }

    public function publish_poll(Request $request)
    {
        $poll = Poll::findOrFail(decrypt($request->id));
        if($poll->is_published == 0){
            if(Poll::where('is_published','1')->get()->isNotEmpty()){
                return back()->with('error','cant publish multiple poll at a time!!');
            }
            $poll->is_published = 1;
            $poll->save();
            return back()->with('success','changes saved successfully!!');
        }else{
            $poll->is_published = 0;
            $poll->save();
            return back()->with('success','changes saved successfully!!!');
        }
        
    }

    public function teacher_index(){
        $teachers = Teacher::all();
        return view('admin.teachers.teachers',compact('teachers'))->with(['navTeacher'=>'active']);
    }

    public function add_teacher(Request $request){
        $teacher_profile_path = '/upload/teacher/';
        $validated = request()->validate([
            'name' => 'required|max:250',
            'subject' => 'required|max:250',
            'sector' => 'required|max:250',
            'profile' => 'required|file|image|max:5000',
        ]);


        if (request()->hasFile('profile')){
            
            if(!is_dir(public_path($teacher_profile_path))){
                $this->makeDir($teacher_profile_path);
            }


            $image = request()->file('profile');
            $basename = Str::random();
            $original = $basename.'.'.$image->getClientOriginalExtension();
            $path = $teacher_profile_path.$original;
            Image::make($image)
            ->fit(100,100)
            ->save(public_path($teacher_profile_path).$original);

        }


        $teacher = Teacher::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'sector' => $request->sector,
            'profile' => $path
        ]);

        return back()->with('success','Item added successfully!!');
    }
    public function edit_teacher(Request $request){
        $teacher_profile_path = '/upload/teacher/';
        $validated = request()->validate([
            'id' => 'required',
            'name' => 'required|max:250',
            'subject' => 'required|max:250',
            'sector' => 'required|max:250',
        ]);
        $id = decrypt($request->id);
        $teacher = Teacher::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->subject = $request->subject;
        $teacher->sector = $request->sector;
        if (request()->hasFile('profile')){
            request()->validate([
                'profile' => 'required|file|image|max:5000',
            ]);
            if(!is_dir(public_path($teacher_profile_path))){
                $this->makeDir($teacher_profile_path);
            }


            $image = request()->file('profile');
            $basename = Str::random();
            $original = $basename.'.'.$image->getClientOriginalExtension();
            $path = $teacher_profile_path.$original;
            Image::make($image)
            ->fit(100,100)
            ->save(public_path($teacher_profile_path).$original);
            
            if(!empty($teacher->profile)){
                File::delete(public_path($teacher->profile));
            }
            $teacher->profile = $path;

        }

        $teacher->save();


        return back()->with('success','Item edited successfully!!');
    }

    public function delete_teacher(Request $request){
        $id = decrypt($request->id);
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return back()->with('success','Item deleted successfully!!');
    }

    public function perticipant_login_permission(Request $request){
        $poll = Poll::findOrFail(decrypt($request->id));
        if($poll->login_permission == 0){

            $poll->login_permission = 1;
            $poll->save();
            return back()->with('success','changes saved successfully!!');
        }else{
            $poll->login_permission = 0;
            $poll->save();
            return back()->with('success','changes saved successfully!!!');
        }

    }

    public function result_index(Request $request){
        $polls = Poll::all();
        return view('admin.result.result',compact('polls'))->with(['navResult'=>'active']);
    }

    public function poll_result($id){
        $id = decrypt($id);
        $poll = Poll::findOrFail($id);
        $voted_perticipant_science  = Perticipant::where('poll_id',$poll->id)->where('is_voted',1)->where('department','science')->get()->count();
        $voted_perticipant_commerce  = Perticipant::where('poll_id',$poll->id)->where('is_voted',1)->where('department','commerce')->get()->count();
        $voted_perticipant_arts  = Perticipant::where('poll_id',$poll->id)->where('is_voted',1)->where('department','arts')->get()->count();

        $topic_count = VoteTopic::all()->count();
        $all_topics_collection = VoteTopic::all();

        $full_mark_science = $voted_perticipant_science * $topic_count;
        $full_mark_commerce = $voted_perticipant_commerce * $topic_count;
        $full_mark_arts = $voted_perticipant_arts * $topic_count;

        $teachers = Teacher::all();
        $result_sheet_collection = [];

        foreach( $teachers as $teacher){
            $teacher_array_deatil_placeholder = ['id'=>$teacher->id,'teacher'=>$teacher,'vote_result'=>[],'overall_mark' => []];
            if($teacher->sector == 'science'){
                if($voted_perticipant_science != 0){
                    foreach($all_topics_collection as $topic){
                        $result_sheet_science = VoteResultSheet::where('poll_id',$poll->id)
                        ->where('teacher_id',$teacher->id)
                        ->where('topic_id',$topic->id)
                        ->select('point')->get()->sum('point');
                        $teacher_mark_percent = ($result_sheet_science / (5 * $voted_perticipant_science)) * 100;
                        $teacher_array_deatil_placeholder['vote_result'][] =  ['topic' => $topic,'mark' => $teacher_mark_percent];
                    }

                    //overall mark percent science

                    $overall_point = VoteResultSheet::where('poll_id',$poll->id)
                    ->where('teacher_id',$teacher->id)
                    ->select('point')->get()->sum('point');
                    $teacher_over_all_mark_percent = ($overall_point / ((5*$topic_count) * $voted_perticipant_science)) * 100;
                    $teacher_array_deatil_placeholder['overall_mark'] =  $teacher_over_all_mark_percent;


                }else{
                    foreach($all_topics_collection as $topic){
                        $teacher_array_deatil_placeholder['vote_result'][] =  ['topic' => $topic,'mark' => 0];
                    }
                }
            }
            if($teacher->sector == 'commerce'){
                if($voted_perticipant_commerce != 0){
                    foreach($all_topics_collection as $topic){
                        $result_sheet_commerece = VoteResultSheet::where('poll_id',$poll->id)
                        ->where('teacher_id',$teacher->id)
                        ->where('topic_id',$topic->id)
                        ->select('point')->get()->sum('point');
                        $teacher_mark_percent = ($result_sheet_commerece / (5 * $voted_perticipant_commerce)) * 100;
                        $teacher_array_deatil_placeholder['vote_result'][] =  ['topic' => $topic,'mark' => $teacher_mark_percent];
                    }

                    
                    //overall mark percent commerce

                    $overall_point = VoteResultSheet::where('poll_id',$poll->id)
                    ->where('teacher_id',$teacher->id)
                    ->select('point')->get()->sum('point');
                    $teacher_over_all_mark_percent = ($overall_point / ((5*$topic_count) * $voted_perticipant_commerce)) * 100;
                    $teacher_array_deatil_placeholder['overall_mark'] =  $teacher_over_all_mark_percent;
                }else{
                    foreach($all_topics_collection as $topic){
                        $teacher_array_deatil_placeholder['vote_result'][] =  ['topic' => $topic,'mark' => 0];
                    }
                }
            }
            if($teacher->sector == 'arts'){
                if($voted_perticipant_arts != 0){
                    foreach($all_topics_collection as $topic){
                        $result_sheet_arts = VoteResultSheet::where('poll_id',$poll->id)
                        ->where('teacher_id',$teacher->id)
                        ->where('topic_id',$topic->id)
                        ->select('point')->get()->sum('point');
                        $teacher_mark_percent = ($result_sheet_arts / (5 * $voted_perticipant_arts)) * 100;
                        $teacher_array_deatil_placeholder['vote_result'][] =  ['topic' => $topic,'mark' => $teacher_mark_percent];
                    }

                    //overall mark percent arts

                    $overall_point = VoteResultSheet::where('poll_id',$poll->id)
                    ->where('teacher_id',$teacher->id)
                    ->select('point')->get()->sum('point');
                    $teacher_over_all_mark_percent = ($overall_point / ((5*$topic_count) * $voted_perticipant_arts)) * 100;
                    $teacher_array_deatil_placeholder['overall_mark'] =  $teacher_over_all_mark_percent;
                }else{
                    foreach($all_topics_collection as $topic){
                        $teacher_array_deatil_placeholder['vote_result'][] =  ['topic' => $topic,'mark' => 0];
                    }
                }
            }
            $result_sheet_collection[] = $teacher_array_deatil_placeholder;
        }
        $result_sheet_collection = collect($result_sheet_collection);
        
        $top_10_result = $result_sheet_collection->sortByDesc('overall_mark')->take(10);
        $top_10_result = $top_10_result->filter(function ($result) {
            return $result['overall_mark'] > 0;
        });

        $top_10_id = [];

        foreach($top_10_result as $item){
            $top_10_id[] = $item['id'];
        }

        $this->top_10_result = $top_10_result;
        $last_10_result = $result_sheet_collection->sortBy('overall_mark');
        $last_10_result = $result_sheet_collection->whereNotIn('id',$top_10_id)->take(10);


        
        return view('admin.result.poll_result',compact('poll'),compact('top_10_result'))->with(['navResult'=>'active','last_10_result' => $last_10_result]);
    }

    
}
