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
        $data = Patient::paginate(5);
        return view('admin.patient.index', compact('data'));
    }

    public function create()
    {
        return view('admin.patient.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|max:50",
            'username' => 'required|unique:patients',
            'birth_date' => "required",
            'address' => 'nullable',
            'phone' => 'nullable'
        ]);
        $hashedPassword = Hash::make('new patient');
        $user = Patient::create($request->all() + ['password' => $hashedPassword]);
        return redirect()->route('patient.index')->with('success', 'Your request succesfully executed.');
    }

    public function show($id)
    {
        $data = Patient::findOrFail($id);
        return view('admin.patient.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $patient = patient::updateOrCreate(['id' => $id], $request->all());
        $wasChanged = $patient->wasChanged();
        if ($wasChanged) {
            return redirect()->route('patient.index')->with('success', 'Your update request succesfully executed.');
        }
        return redirect()->route('patient.index')->with('info', 'We dont found data that you want update, but we created it again.');
    }

    public function destroy($id)
    {
        Patient::destroy($id);
        return redirect()->route('patient.index')->with('warning', 'Your request has been successfully executed');
    }

    public function generateUserName($name, $code = 200)
    {
        $name = substr(str_replace(' ', '', strtolower($name)), 0, rand(6, 10)) . rand(1, 100);
        return response()->json(['name' => $name]);
    }

    public function showLogin()
    {
        return view('user.login');
    }

    public function history($id)
    {
        $patient = Patient::findOrFail($id);
        $data = $patient->user();
        return view('user.history', compact('data'));
    }

    public function changePassword(Request $request)
    {
        $newHash = Hash::make($request->new);
        $userId = Auth::user()->id;
        $userPassword = Auth::user()->password;
        if (Hash::check($request->old, $userPassword)) {
            if (!Hash::check($request->new, $userPassword)) {
                if ($request->new === $request->confirmation) {
                    $user = User::find($userId)->firstOrFail();
                    $user->password = Hash::make($request->new);
                    $user->where('id', '=', $userId)->update(['password' => $user->password]);
                    return redirect()->back()->with("sucMsg", "Password changed successfully !");
                } else {
                        return redirect()->back()->with("errMsg", "Your new password is mismatch. Please try again.");
                    }
            } else {
                return redirect()->back()->with("errMsg", "New Password cannot be same as your current password. Please choose a different password.");
            }
        } else {
            return redirect()->back()->with("errMsg", "Your password is wrong");
        }
    }
}
