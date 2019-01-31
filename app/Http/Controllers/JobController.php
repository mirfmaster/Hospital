<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Job::paginate(5);
        return view('admin.job.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job.form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Job::findOrFail($id);
        return view('admin.job.form',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $job = Job::updateOrCreate(['job_id'=> $id],$request->all());
        $wasChanged = $job->wasChanged();
        if($wasChanged){
            return redirect()->route('job.index')->with('success', 'Your request succesfully executed.');
        }
        return redirect()->route('job.index')->with('success', 'Your request succesfully executed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Job::findOrFail($id);
        if($data->delete()){
            return redirect()->route('job.index')->with('success','Your data has been deleted.');
        }

    }
}
