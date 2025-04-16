<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
        ]);

        
        $slug = Str::slug($request->name);

        Department::create([
            'name' => $request->name,
            'slug' => $slug,  
        ]);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $id,
        ]);

        
        $slug = Str::slug($request->name);

        $department = Department::findOrFail($id);
        $department->update([
            'name' => $request->name,
            'slug' => $slug,  
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }

}
