<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Hash;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data=Patient::paginate(5);
        return view('admin.patient.index',compact('data'));
    }

    public function create()
    {
        return view('admin.patient.form');
    }

    public function store(Request $request)
    {
        $hashedPassword=Hash::make('new patient');
        $user = Patient::create($request->all() + ['password'=>$hashedPassword]);
        return redirect()->route('patient.index')->with('success', 'Your request succesfully executed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Patient::findOrFail($id);
        return view('admin.patient.form',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = patient::updateOrCreate(['id'=> $id],$request->all());
        $wasChanged = $patient->wasChanged();
        if($wasChanged){
            return redirect()->route('patient.index')->with('success', 'Your update request succesfully executed.');
        }
        return redirect()->route('patient.index')->with('info', 'We dont found data that you want update, but we created it again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::destroy($id);
        return redirect()->route('patient.index')->with('warning', 'Your request has been successfully executed');
    }

    public function generateUserName($name,$code =200)
    {
        $name=substr(str_replace(' ','',strtolower($name)), 0, rand(6,10)).rand(1,100);
        return response()->json(['name'=>$name]);
    }

    public function showLogin()
    {
        return view('user.login');
    }
}
