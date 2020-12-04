<?php

namespace App\Http\Controllers\perticipant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perticipant;
use Illuminate\Support\Facades\Auth;
class departmentManager extends Controller
{
    public function __construct(){
        $this->middleware('auth:perticipant');
    }

    public function index(){
        return view('department.department');
    }
    public function store_department($department){
        $department = decrypt($department);
        if($department == 'science'){
            Auth::user()->department = 'science';
            Auth::user()->save();
            return redirect()->route('perticipant.dashboard');
        }
        if($department == 'commerce'){
            Auth::user()->department = 'commerce';
            Auth::user()->save();
            return redirect()->route('perticipant.dashboard');
        }
        if($department == 'arts'){
            Auth::user()->department = 'arts';
            Auth::user()->save();
            return redirect()->route('perticipant.dashboard');
        }
        
    }
}
