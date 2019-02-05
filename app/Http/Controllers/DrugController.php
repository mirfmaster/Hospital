<?php

namespace App\Http\Controllers;

use App\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function index()
    {
        $data=Drug::paginate(5);
        return view('admin.drug.index',compact('data'));
    }

    public function create()
    {
        return view('admin.drug.form');
    }

    public function store(Request $request)
    {
        $drug = Drug::create($request->all());
        return redirect()->route('drug.index')->with('success', 'Your request succesfully executed.');
    }

    public function show($id)
    {
        $data=Drug::findOrFail($id);
        return view('admin.drug.form',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $drug = Drug::updateOrCreate(['drug_id'=> $id],$request->all());
        $wasChanged = $drug->wasChanged();
        if($wasChanged){
            return redirect()->route('drug.index')->with('success', 'Your update request succesfully executed.');
        }
        return redirect()->route('drug.index')->with('info', 'We dont found data that you want update, but we created it again.');
    }

    public function destroy($id)
    {
        $data=Drug::findOrFail($id);
        if($data->delete()){
            return redirect()->route('drug.index')->with('info','Your data has been deleted.');
        }
    }

    public function trashed($id=null,Request $request)
    {
        if(isset($id) && $request->isMethod('PATCH')){
            $data=Drug::onlyTrashed()->findOrFail($id)->restore();
            return redirect()->route('drug.trashed')->with('info','Your data has been restored');
        } elseif (isset($id) && $request->isMethod('DELETE')){
            $data=Drug::onlyTrashed()->findOrFail($id)->forceDelete();
            return redirect()->route('drug.trashed')->with('info','Your data has been fully deleted');
        }
        $data=Drug::onlyTrashed()->paginate(5);
        return view('admin.drug.banned',compact('data'));
    }
}
