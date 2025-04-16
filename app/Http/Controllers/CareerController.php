<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Location;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Pastikan ini diimport

class CareerController extends Controller
{
    // Menampilkan semua pekerjaan
    public function index()
    {
        $careers = Career::all();
        $locations = Location::all();
        $departments = Department::all();
        return view('admin.careers.index', compact('careers', 'locations', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location_id' => 'required',
            'department_id' => 'required',
            'job_level' => 'required',
            'experience' => 'required',
            'work_type' => 'required',
            'job_type' => 'required',
            'deadline_date' => 'required|date',
            'description' => 'required',
            'qualification' => 'required', // Menambahkan validasi qualification
        ]);

        // Membuat slug dari nama
        $slug = Str::slug($request->name);

        Career::create([
            'name' => $request->name,
            'slug' => $slug, // Menambahkan slug
            'location_id' => $request->location_id,
            'department_id' => $request->department_id,
            'job_level' => $request->job_level,
            'experience' => $request->experience,
            'work_type' => $request->work_type,
            'job_type' => $request->job_type,
            'deadline_date' => $request->deadline_date,
            'description' => $request->description,
            'qualification' => $request->qualification, // Menambahkan qualification
        ]);

        return redirect()->route('careers.index')->with('success', 'Career created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location_id' => 'required',
            'department_id' => 'required',
            'job_level' => 'required',
            'experience' => 'required',
            'work_type' => 'required',
            'job_type' => 'required',
            'deadline_date' => 'required|date',
            'description' => 'required',
            'qualification' => 'required', // Menambahkan validasi qualification
        ]);

        $career = Career::findOrFail($id);

        // Membuat slug dari nama
        $slug = Str::slug($request->name);

        $career->update([
            'name' => $request->name,
            'slug' => $slug, // Menambahkan slug
            'location_id' => $request->location_id,
            'department_id' => $request->department_id,
            'job_level' => $request->job_level,
            'experience' => $request->experience,
            'work_type' => $request->work_type,
            'job_type' => $request->job_type,
            'deadline_date' => $request->deadline_date,
            'description' => $request->description,
            'qualification' => $request->qualification, // Menambahkan qualification
        ]);

        return redirect()->route('careers.index')->with('success', 'Career updated successfully.');
    }

    // Menghapus pekerjaan
    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return redirect()->route('careers.index')->with('success', 'Career deleted successfully.');
    }
}
