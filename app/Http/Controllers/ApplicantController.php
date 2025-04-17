<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicants = Applicant::where('status', 'applicant')->get();
        return view('admin.applicants.index', compact('applicants'));
    }

    public function candidate()
    {
        $applicants = Applicant::where('status', 'candidate')->get();
        return view('admin.applicants.candidate', compact('applicants'));
    }

    public function interview()
    {
        $applicants = Applicant::where('status', 'interview')->get();
        return view('admin.applicants.interview', compact('applicants'));
    }

    public function training()
    {
        $applicants = Applicant::where('status', 'training')->get();
        return view('admin.applicants.training', compact('applicants'));
    }

    public function probation()
    {
        $applicants = Applicant::where('status', 'probation')->get();
        return view('admin.applicants.probation', compact('applicants'));
    }

    public function employee()
    {
        $applicants = Applicant::where('status', 'employee')->get();
        return view('admin.applicants.employee', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);
    
        $applicant->update([
            'status' => $request->status,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);
    
        return redirect()->route('applicants.index')->with('success', 'Applicant status updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
