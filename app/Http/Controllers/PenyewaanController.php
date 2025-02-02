<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use App\Models\Laptop;
use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    //
    public function index()
{
    $handphone = Handphone::all();
    $laptop = Laptop::all();
    $penyewaan = Penyewaan::all();
    $users = User::all();

    return view('admin.manajemen-penyewaan', compact('handphone', 'laptop', 'penyewaan', 'users'));
}
public function deletePenyewaan($id_sewa)
{
    $penyewaan = Penyewaan::findOrFail($id_sewa);
    $penyewaan->delete();
    return redirect()->route('manajemen-penyewaan')->with('success', 'Data berhasil dihapus');
}
public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'nama' => 'required',
        'merek' => 'required',
        'tanggal_sewa' => 'required|date',
        'durasi' => 'required|numeric',
        'status' => 'required'
    ]);

    // Create new rental record
    $penyewaan = new Penyewaan();
    $penyewaan->nama = $request->nama;
    $penyewaan->merek = $request->merek;
    $penyewaan->tanggal_sewa = $request->tanggal_sewa;
    $penyewaan->durasi = $request->durasi;
    $penyewaan->status = $request->status;
    $penyewaan->user_id = $request->id; // Save the user ID
    $penyewaan->save();

    // Return JSON response for AJAX request
    if($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Penyewaan berhasil dibuat'
        ]);
    }

    // Return redirect response for regular form submit
    return redirect()->back()->with('success', 'Penyewaan berhasil dibuat');
}


}