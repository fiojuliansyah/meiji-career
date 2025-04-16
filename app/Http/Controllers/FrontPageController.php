<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Location;
use App\Models\Applicant;
use App\Models\Department;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(Request $request)
    {
        $careers = Career::query();

        if ($request->has('keyword') && $request->keyword != '') {
            $careers->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');
        }

        // Filter berdasarkan job level
        if ($request->has('job_level') && $request->job_level != '') {
            $careers->where('job_level', $request->job_level);
        }

        // Filter berdasarkan work type
        if ($request->has('work_type') && $request->work_type != '') {
            $careers->where('work_type', $request->work_type);
        }
        
        if ($request->has('job_type') && $request->job_type != '') {
            $careers->where('job_type', $request->job_type);
        }

        // Filter berdasarkan location
        if ($request->has('location_id') && $request->location_id != '') {
            $careers->where('location_id', $request->location_id);
        }

        // Filter berdasarkan department
        if ($request->has('department_id') && $request->department_id != '') {
            $careers->where('department_id', $request->department_id);
        }

        // Ambil hasil career setelah filter
        $careers = $careers->get();

        // Ambil data lokasi dan department
        $locations = Location::all();
        $departments = Department::all();

        return view('welcome', compact('careers', 'locations', 'departments'));
    }

    public function detail($slug)
    {
        $career = Career::where('slug', $slug)->firstOrFail();
        $relatedCareer = Career::paginate('6');
    
        return view('job-detail', compact('career','relatedCareer'));
    }

    public function jobStore(Request $request)
    {
        if ($request->hasFile('resume')) {
            // Upload file resume (PDF atau gambar)
            $resume = $request->file('resume');
            $resumePath = $resume->store('resumes', 'public'); // Menyimpan file ke storage/app/public/resumes
        }

        $applicant = Applicant::create([
            'career_id' => $request->career_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'resume' => $resumePath, // Menyimpan path resume yang sudah di-upload
        ]);

        // Menambahkan pesan sukses ke session
        session()->flash('success', 'Your application has been submitted successfully!');

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
    

}
