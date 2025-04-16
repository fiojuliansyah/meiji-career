<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Menampilkan semua lokasi
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    // Menyimpan lokasi baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'map' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        Location::create([
            'name' => $request->name,
            'map' => $request->map,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }


    // Mengupdate lokasi yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'map' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $location = Location::findOrFail($id);
        $location->update([
            'name' => $request->name,
            'map' => $request->map,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    // Menghapus lokasi
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
