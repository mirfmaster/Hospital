<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type=null)
    {
        $data=User::with('roles')->paginate(10);
        return view('admin.org.index',compact('data'));
    }

    public function create($id=null)
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('admin.org.form',compact('roles'));
    }

    public function show($id)
    {
        $data=User::with('roles')->findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        return view('admin.org.form',compact('data','roles'));
    }

    public function store(Request $request)
    {
        $hashedPassword=Hash::make('secret');
        $user = User::create($request->all() + ['password'=>$hashedPassword]);
        $user->syncRoles($request->role);
        return redirect()->route('user.index')->with('success', 'Your request succesfully executed.');
    }


    public function update(Request $request, $id)
    {
        $user = User::updateOrCreate(['id'=> $id],$request->all());
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
    public function trashed($id=null,Request $request)
    {
        if(isset($id) & $request->isMethod('PATCH')){
            $data=Job::onlyTrashed()->findOrFail($id)->restore();
            return redirect()->route('user.trashed')->with('info','Your data has been restored');
        } elseif (isset($id) & $request->isMethod('DELETE')){
            $data=Job::onlyTrashed()->findOrFail($id)->forceDelete();
            return redirect()->route('user.trashed')->with('info','Your data has been fully deleted');
        }
        $data=Job::onlyTrashed()->paginate(5);
        return view('admin.org.banned',compact('data'));
    }
}
