<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;

class DiagnosisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['except'=>'show']);
        $this->middleware('auth:web',['only'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user=User::with('patients')->get();
        $data=User::orderBy('name')->paginate(5);
        // $patients=$user->patients();
        // foreach ($users as $user) {
        //     foreach ($user->patients as $pa) {
        //         dd($pa->pivot->diagnose);
        //     }
        // }
        // dd($user->toArray());
        return view('admin.diagnosis.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $patients=Patient::all();
        return view('admin.diagnosis.form')->with('patients',$patients)->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::findOrFail($request->user_id);
        $save=$user->patients()->attach($request->patient_id,['diagnose'=>$request->diagnose]);
        return redirect()->route('diagnosis.index')->with('success', 'Your request succesfully executed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient,$id)
    {
        $data=auth()->user()->with('user')->find($id);
        return view('user.history',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$userid)
    {
        $doctor=User::findOrFail($userid);
        $delete=$doctor->patients()->detach($request->patient_id);
        dd($delete);
    }
}
