<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Prescription;
use DB;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['only' => ['show', 'prescription']]);
        $this->middleware('auth:admin', ['except' => ['show', 'prescription']]);
    }

    public function index()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.diagnosis.index', compact('data'));
    }

    public function create()
    {
        $users = User::all();
        $patients = Patient::all();
        return view('admin.diagnosis.form')->with('patients', $patients)->with('users', $users);
    }

    public function store(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $save = $user->patients()->attach($request->patient_id, ['diagnose' => $request->diagnose]);
        $lastInsertedId = DB::table('diagnosis')->orderBy('id', 'DESC')->first()->id;
        if (isset($request->prescription)) {
            $savePrescription = new Prescription;
            $savePrescription->diagnose_id = $lastInsertedId;
            $savePrescription->medical_prescription = $request->medical_prescription;
            $savePrescription->validity_period = $request->validity_period;
            $savePrescription->save();
        }
        return redirect()->route('diagnosis.index')->with('success', 'Your request succesfully executed.');
    }

    public function show(Patient $patient, $id)
    {
        $data = $patient->find($id);

        $prescription = Prescription::get();
        // dd($data,$prescription);
        return view('user.history', compact('data', 'prescription'));
    }

    public function prescription($id)
    {
        $prescription = DB::table('diagnosis')
            ->join('prescriptions', 'diagnosis.id', '=', 'prescriptions.diagnose_id')
            ->join('patients', 'diagnosis.patient_id', 'patients.id')
            ->join('users', 'diagnosis.user_id', 'users.id')
            ->where('diagnosis.id', '=', $id)
            ->select('diagnosis.*', 'patients.name', 'prescriptions.*', 'users.name as doctor')
            ->first();
        $patientName = Auth::user()->name;
        // $target_dir = public_path('QRCode/' . $patientName . "/");
        // $newQR = $target_dir . $patientName . ".png";
        // QrCode::generate('Make me into a QrCode!', $newQR);
        $pdf = PDF::loadView('user.prescription', compact('prescription'));
        return $pdf->stream();
        // return $pdf->download('reports.pdf');
    }
}
