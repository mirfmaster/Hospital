<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $data= Job::paginate(5);
        return view('admin.job.index',compact('data'));
    }

    public function create()
    {
        return view('admin.job.form');
    }

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
    
    public function store(Request $request)
    {
        $job = Job::create($request->all());
        return redirect()->route('job.index')->with('success', 'Your request succesfully executed.');
    }

    public function destroy($id)
    {
        $data=Job::findOrFail($id);
        if($data->delete()){
            return redirect()->route('job.index')->with('success','Your data has been deleted.');
        }
    }

    public function trashed($id=null,Request $request)
    {
        if(isset($id) & $request->isMethod('PATCH')){
            $data=Job::onlyTrashed()->findOrFail($id)->restore();
            return redirect()->route('job.trashed')->with('success','Your data has been restored');
        } elseif (isset($id) & $request->isMethod('DELETE')){
            $data=Job::onlyTrashed()->findOrFail($id)->forceDelete();
            return redirect()->route('job.trashed')->with('danger','Your data has been fully deleted');
        }
        $data=Job::onlyTrashed()->paginate(5);
        return view('admin.job.banned',compact('data'));
    }
}
