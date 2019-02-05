<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $data=User::paginate(10);
        return view('admin.org.index',compact('data'));
    }

    public function create($id=null)
    {
        return view('admin.org.form');
    }

    public function show($id)
    {
        $data=User::findOrFail($id);
        return view('admin.org.form',compact('data'));
    }

    public function store(Request $request)
    {
        $hashedPassword=Hash::make('secret');
        $user = User::create($request->all() + ['password'=>$hashedPassword]);
        return redirect()->route('user.index')->with('success', 'Your request succesfully executed.');
    }


    public function update(Request $request, $id)
    {
        $user = User::updateOrCreate(['user_id'=> $id],$request->all());
        $wasChanged = $user->wasChanged();
        if($wasChanged){
            return redirect()->route('user.index')->with('success', 'Your update request succesfully executed.');
        }
        return redirect()->route('user.index')->with('info', 'We dont found data that you want update, but we created it again.');
    }

    public function destroy($id)
    {
        $data=User::findOrFail($id);
        if($data->delete()){
            return redirect()->route('job.index')->with('info','Your data temporarily deleted.');
        }
    }
}
